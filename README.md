# Kohana Demo

This repository contains a Kohana demo application to demonstrate the usage of the
following modules: 

* [Kohana Red](https://github.com/davidstutz/kohana-red): Secure user authentication module.
* [Kohana Green](https://github.com/davidstutz/kohana-green): Access control module based on Red.
* [Kohana Yellow](https://github.com/davidstutz/kohana-yellow): Logging for Green.
* [Kohana Blue](https://github.com/davidstutz/kohana-blue): User configuration module based on Red.
* [Kohana Gaps](https://github.com/davidstutz/kohana-gaps): Form generation and validation module linked to the ORM module.
* [Kohana Navigation](https://github.com/davidstutz/kohana-navigation): Navigation generation module.

The demo application comes in three branches: `master` currently running Kohana 3.3.6,
`3.2` for the latest Kohana 3.2 and `3.1` for the latest Kohana 3.1. For the
corresponding installation instructions (in case they deviate), see the corresponding
`README.md`.

## Installation

The application is intended for a local installation and should not be installed
in a production environment. Installation has been tested on a local LAMPP installation
on Ubuntu 14.04.

Instructions:

* Clone the repository using `git clone --recursive`, make sure to get thee desired branch.
* If the repository is not located in the root directory, for example in `htdocs/kohana-demo`,
`application/bootstrap.php` and `.htaccess` should be adapted accordingly. In
particular, replace the root path `kohana-demo/`.
* Create a database, for example using [PHPMyAdmin](https://www.phpmyadmin.net/)
or [Adminer](https://www.adminer.org/), named `kohana_demo`. If this name is not
available, choose a different name and update `application/config/database.php`
accordingly.
* Create the necessary tables using `schema.sql`, for example after creating a
database using PHPMyAdmin, execute the corresponding SQL statements in the newly
created database.
* Test the installation by navigating to `localhost/kohana-demo` (in case, the installation
path was not changed).

# Screenshots

![Login.](login1.png?raw=true "Login.")

![Login after user creation.](login2.png?raw=true "Login after user creation.")

![User configuration.](config1.png?raw=true "User configuration.")

![User configuration after creating a configuration options.](config2.png?raw=true "User configuration after creating a configuration options.")

[User logs.](logs.png?raw=true "User logs.")

[User management.](users.png?raw=true "User management.")

[Edit user.](user.png?raw=true "Edit user.")

## License

Copyright (c) 2016, David Stutz All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
* Neither the name of the copyright holder nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
