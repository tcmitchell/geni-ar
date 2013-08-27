<?php
//----------------------------------------------------------------------
// Copyright (c) 2012 Raytheon BBN Technologies
//
// Permission is hereby granted, free of charge, to any person obtaining
// a copy of this software and/or hardware specification (the "Work") to
// deal in the Work without restriction, including without limitation the
// rights to use, copy, modify, merge, publish, distribute, sublicense,
// and/or sell copies of the Work, and to permit persons to whom the Work
// is furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be
// included in all copies or substantial portions of the Work.
//
// THE WORK IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
// OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
// MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
// NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
// HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
// WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE WORK OR THE USE OR OTHER DEALINGS
// IN THE WORK.
//----------------------------------------------------------------------
require_once('db_utils.php');
require_once('ar_constants.php');
include_once('/etc/geni-ar/settings.php');

$conn = db_conn();
$sql = "SELECT * FROM " . $AR_TABLENAME . " WHERE request_state='REQUESTED'";
$result = db_fetch_rows($sql);
$rows = $result['value'];

function get_values($row)
{
  global $id, $firstname, $lastname, $email, $uname, $phone, $requested, $created, $org, $title, $reason;

  $id = $row['id'];
  $firstname = $row['first_name'];
  $lastname = $row['last_name'];
  $email = $row['email'];
  $uname = $row['username_requested'];
  $phone = $row['phone'];
  $requested = $row['request_ts'];
  $requested = substr($requested,0,16);
  $created = $row['created_ts'];
  $created = substr($created,0,16);
  $org = $row['organization'];
  $title = $row['title'];
  $reason = $row['reason'];
}

print '<h1>';
print '<p>Current Account Requests</p>';
print '</h1>';

print '<table border="1">';
print '<tr>';
print '<th> </th>';
print '<th>Institution</th><th>Job Title</th><th>Account Reason</th>';
print '<th>Email Address</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Username</th><th>Account Requested</th></tr>';
foreach ($rows as $row) {
  get_values($row);
  print "<tr>";
  print'<td align="center">';
  print '<form method="POST" action="request_actions.php">';
  $actions = '<select name=action><option value="approve">APPROVE</option><option value="deny">DENY</option><option value="hold">HOLD</option></select>';
  print $actions;
  print '<input type="submit" value="SUBMIT"/>';
  print "<input type=\"hidden\" name=\"id\" value=\"$id\"/>";
  print "</form>";
  print "</td>";

  print "<td>$org</td><td>$title</td><td>$reason</td><td>$email</td><td>$firstname</td><td>$lastname</td><td>$phone</td><td>$uname</td><td>$requested</td>";
  print '</tr>';
}
print '</table>';

$sql = "SELECT * FROM " . $AR_TABLENAME . " WHERE request_state='HOLD'";
$result = db_fetch_rows($sql);
$rows = $result['value'];

print '<h1>';
print '<p>Account Requests On-Hold</p>';
print '</h1>';

print '<table border="1">';
print '<tr>';
print '<th> </th>';
print '<th>Institution</th><th>Job Title</th><th>Account Reason</th>';
print '<th>Email Address</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Username</th><th>Account Requested</th></tr>';
foreach ($rows as $row) {
  get_values($row);
  print "<tr>";
  print'<td align="center">';
  print '<form method="POST" action="request_actions.php">';
  $actions = '<select name=action><option value="approve">APPROVE</option><option value="deny">DENY</option></select>';
  print $actions;
  print '<input type="submit" value="SUBMIT"/>';
  print "<input type=\"hidden\" name=\"id\" value=\"$id\"/>";
  print "</form>";
  print "</td>";
  print "<td>$org</td><td>$title</td><td>$reason</td><td>$email</td><td>$firstname</td><td>$lastname</td><td>$phone</td><td>$uname</td><td>$requested</td>";
  print '</tr>';
}
print '</table>';


$sql = "SELECT * FROM " . $AR_TABLENAME . " WHERE request_state='APPROVED'";
$result = db_fetch_rows($sql);
$rows = $result['value'];

print '<h1>';
print '<p>Approved Account Requests</p>';
print '</h1>';

print '<table border="1">';
print '<tr>';
print '<th>Institution</th><th>Job Title</th><th>Account Reason</th>';
print '<th>Email Address</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Username</th><th>Account Requested</th><th>Account Created</th></tr>';
foreach ($rows as $row) {
  get_values($row);
  print "<td>$org</td><td>$title</td><td>$reason</td><td>$email</td><td>$firstname</td><td>$lastname</td><td>$phone</td><td>$uname</td><td>$requested</td><td>$created</td>";
  print '</tr>';
}
print '</table>';

$sql = "SELECT * FROM " . $AR_TABLENAME . " WHERE request_state='DENIED'";
$result = db_fetch_rows($sql);

$rows = $result['value'];

print '<h1>';
print '<p>Denied Account Requests</p>';
print '</h1>';

print '<table border="1">';
print '<tr>';
print '<th>Institution</th><th>Job Title</th><th>Account Reason</th>';
print '<th>Email Address</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Username</th><th>Account Requested</th></tr>';
foreach ($rows as $row) {
  get_values($row);
  print "<td>$org</td><td>$title</td><td>$reason</td><td>$email</td><td>$firstname</td><td>$lastname</td><td>$phone</td><td>$uname</td><td>$requested</td>";
  print '</tr>';
}
print '</table>';

?>