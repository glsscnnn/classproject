## Library Management System

School project or smth.

## Setup

- Run `docker-compose up -d` should just work the site is located on port `8000`
- Run `sql/init.sh` will initialize the database

## TODO

- [x] Add an `sql` directory containing data for initial tables
- [x] Migrate to pico
- [x] Sign in page (both)
- [x] Sign up page (both)
- [x] Catalog page
    - [x] Patron catalog view
    - [x] Staff catalog view
- [x] Fines page (user)
- [ ] Handle user fines (user) (in-progress)
- [ ] Handle checkout (user) (in-progress)
- [ ] Update users page (admin)
- [ ] Handle update users (admin)
- [x] Update fines page (admin)
- [x] Add fines form (admin)
- [x] Update books page (admin)
- [x] Handle update books (admin)
- [x] Handle update fines (admin)
- [x] Handle add fines (admin)
- [x] Search result page (both)
- [x] Handle sign up user (both)
- [x] Handle login user (both)
- [ ] Injection Tests Page (use prepared statements and real escape)
