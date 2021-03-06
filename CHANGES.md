# GENI Account Request System Release Notes

# [Release 1.11](https://github.com/GENI-NSF/geni-ar/milestones/1.11)

## Changes

* None

## Installation Notes

* None

# [Release 1.10](https://github.com/GENI-NSF/geni-ar/milestones/1.10)

## Changes

* Fix a syntax error on the approve page
  ([#176](https://github.com/GENI-NSF/geni-ar/issues/176))
* Clean up expired account reporting
  ([#178](https://github.com/GENI-NSF/geni-ar/issues/178))
* Close GENI IdP to new accounts
  ([#179](https://github.com/GENI-NSF/geni-ar/issues/179))

## Installation Notes

* None

# [Release 1.9](https://github.com/GENI-NSF/geni-ar/milestones/1.9)

## Changes

* Add script to print/email expired accounts, for use in crontab.
  ([#167](https://github.com/GENI-NSF/geni-ar/issues/167))
* Tutorial accounts no longer get an email address. Users
  will need to self-assert their address at the Portal.
  ([#164](https://github.com/GENI-NSF/geni-ar/issues/164))
* Add expiration on tutorial accounts.
  ([#158](https://github.com/GENI-NSF/geni-ar/issues/158))
* Tutorial accounts get the affiliation `library-walk-in` not `staff`.
  ([#163](https://github.com/GENI-NSF/geni-ar/issues/163))
* Do not set the `staff` affiliation, only `member`.
  ([#166](https://github.com/GENI-NSF/geni-ar/issues/166))
* Show URL (e.g. profile) for requests.
  ([#165](https://github.com/GENI-NSF/geni-ar/issues/165))

## Installation Notes

* Add `expiration` column to `idp_account_request`:

   ```
   psql -U accreq -h localhost accreq < /usr/share/geni-ar/db/postgresql/update-3.sql
   ```

* Allow null `email` in `idp_account_request` (for tutorials):

   ```
   psql -U accreq -h localhost accreq < /usr/share/geni-ar/db/postgresql/update-4.sql
   ```

* Add crontab entry to detect expired accounts.

   ```
   $ sudo crontab -u root -e
   ```

  Then at the bottom of the file, add these lines:

   ```
   # Email admins the usernames of any expired but active IdP accounts
   0 1 * * * /usr/local/bin/geni-ar-expired-accounts
   ```

# [Release 1.8](https://github.com/GENI-NSF/geni-ar/milestones/1.8)

* Sort whitelisted institutions.
  ([#140](https://github.com/GENI-NSF/geni-ar/issues/140))
* Check that phone numbers use only legal characters.
  ([#146](https://github.com/GENI-NSF/geni-ar/issues/146))
* Add link to page to manage whitelisted domains.
  ([#150](https://github.com/GENI-NSF/geni-ar/issues/150))
* Remove obsolete options for admin to `CONFIRM REQUESTER`
  or `CHANGE PASSWRD`. These are self service now.
  ([#149](https://github.com/GENI-NSF/geni-ar/issues/149)),
  ([#117](https://github.com/GENI-NSF/geni-ar/issues/117))
* Look up the correct account request when email address is
  confirmed and we email the admins.
  ([#147](https://github.com/GENI-NSF/geni-ar/issues/147))
* Removed `Current Reqs` tab; requests pending confirmation
  are on Waiting for Confirmation tab.
  ([#148](https://github.com/GENI-NSF/geni-ar/issues/148))
* Add initial system documentation
  ([#152](https://github.com/GENI-NSF/geni-ar/issues/152))

# [Release 1.7](https://github.com/GENI-NSF/geni-ar/milestones/1.7)

* Reduce number of admin emails
  ([#138](https://github.com/GENI-NSF/geni-ar/issues/138))
* Notice pending requests in an email-confirmed state
  ([#141](https://github.com/GENI-NSF/geni-ar/issues/141))
* Add CentOS 7 installation docs
  ([#143](https://github.com/GENI-NSF/geni-ar/issues/143))
* Add RPM packaging
  ([#144](https://github.com/GENI-NSF/geni-ar/issues/144))

# [Release 1.6](https://github.com/GENI-NSF/geni-ar/milestones/1.6)

* Standardize HTML headers, declare UTF-8 charset
  ([#135](https://github.com/GENI-NSF/geni-ar/issues/135))

# [Release 1.5.1](https://github.com/GENI-NSF/geni-ar/milestones/1.5.1)

* Stop requiring a non-existent file
  ([#133](https://github.com/GENI-NSF/geni-ar/issues/133))

# [Release 1.5](https://github.com/GENI-NSF/geni-ar/milestones/1.5)

* Handle international characters via UTF8 encoding
  ([#64](https://github.com/GENI-NSF/geni-ar/issues/64))
* Add ordering for entries in account manager tables
  ([#128](https://github.com/GENI-NSF/geni-ar/issues/128))

# [Release 1.4](https://github.com/GENI-NSF/geni-ar/milestones/1.4)

* Add an auto-approve whitelist capability
  ([#13](https://github.com/GENI-NSF/geni-ar/issues/13))
* Add automated email verification
  ([#29](https://github.com/GENI-NSF/geni-ar/issues/29))
* Fix redirect after adding a note
  ([#85](https://github.com/GENI-NSF/geni-ar/issues/85))
* Allow for apostrophes in notes
  ([#94](https://github.com/GENI-NSF/geni-ar/issues/94))
* Add username recovery page
  ([#96](https://github.com/GENI-NSF/geni-ar/issues/96))
* Make reason field larger
  ([#98](https://github.com/GENI-NSF/geni-ar/issues/98))
* Make default account request action nothing
  ([#100](https://github.com/GENI-NSF/geni-ar/issues/100))
* Add 'new' to password reset page
  ([#104](https://github.com/GENI-NSF/geni-ar/issues/104))
* Do not reissue deleted accounts
  ([#106](https://github.com/GENI-NSF/geni-ar/issues/106))
* Update the information link in the notification email
  ([#110](https://github.com/GENI-NSF/geni-ar/issues/110))
* Make tables on account manager pages searchable
* Update account manager UI with similar style to portal
* Add self-service password resets
