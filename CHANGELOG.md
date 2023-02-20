## 1.0.0 (2023-02-20)


### ⚠ BREAKING CHANGES

* options (`webauthn.auth.options` and `webauthn.store.options`) routes are now POST. GET routes are reserved for the views (`webauthn.login` and `webauthn.create`). `webauthn.auth` and `webauthn.store` routes must send data flatten. See details in https://github.com/asbiin/laravel-webauthn/blob/main/docs/migration-v2-to-v3.md .
- `LoginViewResponse` contract has now a `setPublicKey` method
- `RegisterSuccessResponse` contract has now a `setWebauthnKey` method
- `RegisterViewResponse` contract has now a `setPublicKey` method
- `Webauthn::login()` now takes 1 argument for `$user`: `login(\Illuminate\Contracts\Auth\Authenticatable $user)`
* This new version is a rewrite with a lot of breaking changes, see details in https://github.com/asbiin/laravel-webauthn/blob/main/docs/migration-v1-to-v2.md

### Features

* add a new Webauthn::enabled function ([#2](https://github.com/Hann0T/laravel-webauthn/issues/2)) ([5e6e74a](https://github.com/Hann0T/laravel-webauthn/commit/5e6e74ab27d90357ca0308e772b9b48ee946dd09))
* add a way to put a name to a new key ([#66](https://github.com/Hann0T/laravel-webauthn/issues/66)) ([58f9353](https://github.com/Hann0T/laravel-webauthn/commit/58f93538576ed9c0fd661d98ba8b3c9fecd0234d))
* add attestation statement support manager ([#3](https://github.com/Hann0T/laravel-webauthn/issues/3)) ([0e3b368](https://github.com/Hann0T/laravel-webauthn/commit/0e3b3681612ae667b58186f027474082bc3a6fb4))
* add callback URL in session ([#19](https://github.com/Hann0T/laravel-webauthn/issues/19)) ([70037ae](https://github.com/Hann0T/laravel-webauthn/commit/70037ae924c809d50519dab251f940ae5a19595e))
* add crowdin file ([#204](https://github.com/Hann0T/laravel-webauthn/issues/204)) ([201057a](https://github.com/Hann0T/laravel-webauthn/commit/201057a1f23a6fb5463264e233beb799b7d68632))
* add Google Safetynet Apikey config ([#43](https://github.com/Hann0T/laravel-webauthn/issues/43)) ([955c272](https://github.com/Hann0T/laravel-webauthn/commit/955c272b1afd102bc8d60123c2a0425fa0250278))
* add javascript and other resources files ([#24](https://github.com/Hann0T/laravel-webauthn/issues/24)) ([aa1e991](https://github.com/Hann0T/laravel-webauthn/commit/aa1e99102e9b1198ef23f9a411d75cc5b3a5e5eb))
* add login event on eloquent provider login ([#392](https://github.com/Hann0T/laravel-webauthn/issues/392)) ([16a720e](https://github.com/Hann0T/laravel-webauthn/commit/16a720ea15cca233c3c670b1532650d8a1a5d665))
* add login without password, and some rewrite ([#361](https://github.com/Hann0T/laravel-webauthn/issues/361)) ([6778707](https://github.com/Hann0T/laravel-webauthn/commit/6778707b546a9fbd64e5bc0e31091acd1302c749))
* add new redirects ([#12](https://github.com/Hann0T/laravel-webauthn/issues/12)) ([1e5bcdd](https://github.com/Hann0T/laravel-webauthn/commit/1e5bcdda753b7845652958b3fa4aa992fcf8e184))
* Add support to Laravel 9.x, and remove Laravel 7.x and 8.x ([#377](https://github.com/Hann0T/laravel-webauthn/issues/377)) ([bf6c54a](https://github.com/Hann0T/laravel-webauthn/commit/bf6c54a27735def337e296cde9de126d131d861f))
* add WebauthnAuthenticatable trait ([#393](https://github.com/Hann0T/laravel-webauthn/issues/393)) ([747df5a](https://github.com/Hann0T/laravel-webauthn/commit/747df5ab7bf0f88bbb36f11c0f281464d6c29d0b))
* add WebauthnLoginData event ([#10](https://github.com/Hann0T/laravel-webauthn/issues/10)) ([a95c907](https://github.com/Hann0T/laravel-webauthn/commit/a95c907a4419e6625f40e39adc4053fb3430435e))
* Change dependency for laravel 8 ([#305](https://github.com/Hann0T/laravel-webauthn/issues/305)) ([396e50c](https://github.com/Hann0T/laravel-webauthn/commit/396e50c21e9ba586462fed3c848fd7225e8f7351))
* config for key creation. ([a88c626](https://github.com/Hann0T/laravel-webauthn/commit/a88c6263bef1de048265e0e09ec76c398b8a1b0e))
* init repository ([#1](https://github.com/Hann0T/laravel-webauthn/issues/1)) ([e466a6c](https://github.com/Hann0T/laravel-webauthn/commit/e466a6c260756572cb5a8725bcb289b634168655))
* Login listener to store a cookie. ([2ca7500](https://github.com/Hann0T/laravel-webauthn/commit/2ca7500ece8396268f23c4dfe6ffe3143b9f7c28))
* make the callback url setable by the user before the middleware hit ([#186](https://github.com/Hann0T/laravel-webauthn/issues/186)) ([4e82414](https://github.com/Hann0T/laravel-webauthn/commit/4e82414d5f03213446c5ce397defbd9eea726274))
* new Middleware. ([1fa9e2d](https://github.com/Hann0T/laravel-webauthn/commit/1fa9e2d891ef0e850b5ccfec43713266de4ec721))
* new route to get the keys. ([0094032](https://github.com/Hann0T/laravel-webauthn/commit/0094032f1e1cadc6312a2e9d996da260c8e11355))
* new vue componentes for auth and register. ([d16579b](https://github.com/Hann0T/laravel-webauthn/commit/d16579b3a69825611deef10e42740fde4f0d7a7e))
* new vue componentes for auth and register. ([0663868](https://github.com/Hann0T/laravel-webauthn/commit/0663868f544441b2eb4a1b2eafb6d9af6092c754))
* remove diactoros ([#4](https://github.com/Hann0T/laravel-webauthn/issues/4)) ([94fba13](https://github.com/Hann0T/laravel-webauthn/commit/94fba1330457e8a15db6ad6adfe1f14a3fbbe476))
* require php 8.1+ ([#378](https://github.com/Hann0T/laravel-webauthn/issues/378)) ([af83780](https://github.com/Hann0T/laravel-webauthn/commit/af837802ca436d21e15f1b47ca2724ee7b1aaf70))
* return a resource after registering ([#7](https://github.com/Hann0T/laravel-webauthn/issues/7)) ([3c3a7bf](https://github.com/Hann0T/laravel-webauthn/commit/3c3a7bf2148d19b1077d9dfd5891522f95bf1ae5))
* rewrite for more customizable library ([#355](https://github.com/Hann0T/laravel-webauthn/issues/355)) ([424caae](https://github.com/Hann0T/laravel-webauthn/commit/424caae085bed85781ad7eef8904d644517d02f2))
* Support Laravel 10.0, and remove TokenBindingHandler ([#419](https://github.com/Hann0T/laravel-webauthn/issues/419)) ([007c37a](https://github.com/Hann0T/laravel-webauthn/commit/007c37acad5ba9f5fc7c0351284f948bf6a6e4b6))
* update guzzlehttp/psr7 requirement to || ^2.0 ([#350](https://github.com/Hann0T/laravel-webauthn/issues/350)) ([8fe8c8a](https://github.com/Hann0T/laravel-webauthn/commit/8fe8c8a77b0967d272a89cf7f8eb5ebed8434a6b))
* upgrade to WebAuthn v3.0 ([#216](https://github.com/Hann0T/laravel-webauthn/issues/216)) ([cf60588](https://github.com/Hann0T/laravel-webauthn/commit/cf60588efd51a57527badfce1834ac4283472f18))
* use host without port for RP ID ([#339](https://github.com/Hann0T/laravel-webauthn/issues/339)) ([b957ef8](https://github.com/Hann0T/laravel-webauthn/commit/b957ef8d8dd9a0b9a119f1bb97e855bf9f61ac22))


### Bug Fixes

* default views. ([893efc2](https://github.com/Hann0T/laravel-webauthn/commit/893efc24932cc97e942d0978f9b0684a390b4cf7))
* **docs:** README. ([f205a95](https://github.com/Hann0T/laravel-webauthn/commit/f205a956347bb9c9664f64defde79a055b17a1b0))
* fix aaguid parsing ([#146](https://github.com/Hann0T/laravel-webauthn/issues/146)) ([38aa36d](https://github.com/Hann0T/laravel-webauthn/commit/38aa36dd8a312886d913f05515f73cfd6279dbf2))
* fix attestation validation by re-encoding response.clientDataJSON ([#405](https://github.com/Hann0T/laravel-webauthn/issues/405)) ([7956958](https://github.com/Hann0T/laravel-webauthn/commit/79569586790c0df0b1953dfb917d6f6d376be65e))
* fix authenticatorData format ([#402](https://github.com/Hann0T/laravel-webauthn/issues/402)) ([155ae8c](https://github.com/Hann0T/laravel-webauthn/commit/155ae8cd2fea1cee5dd0fc0f28ca1d539d80392f))
* fix axios integrity in blade views ([#422](https://github.com/Hann0T/laravel-webauthn/issues/422)) ([04a969d](https://github.com/Hann0T/laravel-webauthn/commit/04a969dde6af3acf58c7bf836033ca68c97ca260))
* fix base64 padding ([#381](https://github.com/Hann0T/laravel-webauthn/issues/381)) ([6ce3783](https://github.com/Hann0T/laravel-webauthn/commit/6ce37830ec89881a75b1d9afffedff57237e92e9))
* fix coverage ([#220](https://github.com/Hann0T/laravel-webauthn/issues/220)) ([c8b30ac](https://github.com/Hann0T/laravel-webauthn/commit/c8b30ac571c28c7dc850aa6812f546b973379b33))
* fix credentialId migration type ([#396](https://github.com/Hann0T/laravel-webauthn/issues/396)) ([ea63d70](https://github.com/Hann0T/laravel-webauthn/commit/ea63d70bcc2733526fb8e72af5c5511cd301d899))
* fix github action pull request run ([#222](https://github.com/Hann0T/laravel-webauthn/issues/222)) ([906b2bc](https://github.com/Hann0T/laravel-webauthn/commit/906b2bc1b00e36ee1e401fe44018a5e41cfb8025))
* fix github action sonar ([#184](https://github.com/Hann0T/laravel-webauthn/issues/184)) ([d934b6a](https://github.com/Hann0T/laravel-webauthn/commit/d934b6a3284cf0b024dbe2b7bbf64f57a4f3ab1a))
* fix google safetynet config test ([#62](https://github.com/Hann0T/laravel-webauthn/issues/62)) ([98d46b7](https://github.com/Hann0T/laravel-webauthn/commit/98d46b795a58cf21ef40a3d6a72ef39c9cfe59d7))
* fix javascript base64url decode function ([#155](https://github.com/Hann0T/laravel-webauthn/issues/155)) ([f977d2d](https://github.com/Hann0T/laravel-webauthn/commit/f977d2dea6e75e8e0fa1798ea2aba308669ca38b))
* fix javascript resource in case no key is registered yet ([#30](https://github.com/Hann0T/laravel-webauthn/issues/30)) ([5afc14b](https://github.com/Hann0T/laravel-webauthn/commit/5afc14beb62eafb4853ba1deb94ac6845193a295))
* fix padding on client side ([#420](https://github.com/Hann0T/laravel-webauthn/issues/420)) ([fa24635](https://github.com/Hann0T/laravel-webauthn/commit/fa246351081aac52c7cb48fbabf42510c3475ab9))
* fix readme ([#11](https://github.com/Hann0T/laravel-webauthn/issues/11)) ([7cba5e3](https://github.com/Hann0T/laravel-webauthn/commit/7cba5e3d1fa72fdf89edfb1ab393446caca1308a))
* fix redirect guest callback ([#21](https://github.com/Hann0T/laravel-webauthn/issues/21)) ([170c6cd](https://github.com/Hann0T/laravel-webauthn/commit/170c6cd630adde8ce33e738a5fd633044305b20c))
* fix RegisterViewResponse ([#362](https://github.com/Hann0T/laravel-webauthn/issues/362)) ([d3a7f9b](https://github.com/Hann0T/laravel-webauthn/commit/d3a7f9b9410021b84fd86b86fa77f4d2b41cc15a))
* fix some contracts binding ([#6](https://github.com/Hann0T/laravel-webauthn/issues/6)) ([1c2d803](https://github.com/Hann0T/laravel-webauthn/commit/1c2d803d6463bea25ea3658cc0e96cc7fa05a1f8))
* fix Uuid decode & update dependencies ([#174](https://github.com/Hann0T/laravel-webauthn/issues/174)) ([0963dd5](https://github.com/Hann0T/laravel-webauthn/commit/0963dd565408acaf7d353ddcd5fdc02f72fda012))
* fixed wrong schema name in down() function ([#201](https://github.com/Hann0T/laravel-webauthn/issues/201)) ([1aaae1b](https://github.com/Hann0T/laravel-webauthn/commit/1aaae1b055dfd8040ac91abe9284b7fc70ec82eb))
* json serialize publickey for cache store ([#385](https://github.com/Hann0T/laravel-webauthn/issues/385)) ([1b6ad1b](https://github.com/Hann0T/laravel-webauthn/commit/1b6ad1b719ae70c850dffaa24d676b2f63b346b2))
* name the destroy route ([#32](https://github.com/Hann0T/laravel-webauthn/issues/32)) ([a155a21](https://github.com/Hann0T/laravel-webauthn/commit/a155a21f62a5578609952993cf0c5511fd41abce))
* no timestamp update when updating a key ([#397](https://github.com/Hann0T/laravel-webauthn/issues/397)) ([0561054](https://github.com/Hann0T/laravel-webauthn/commit/05610549427974bf8a3f0cc32a58e4050d9f7792))
* remove Guzzle6 direct dependency ([#49](https://github.com/Hann0T/laravel-webauthn/issues/49)) ([0e00ca3](https://github.com/Hann0T/laravel-webauthn/commit/0e00ca3774008a0321b1e1735d6bf60670025de9))
* securing the register route from unchecked users ([#315](https://github.com/Hann0T/laravel-webauthn/issues/315)) ([9820c82](https://github.com/Hann0T/laravel-webauthn/commit/9820c8267db0dcbf7a2e75cdcb001d79ece13218))
* semicolon. ([f4ba24a](https://github.com/Hann0T/laravel-webauthn/commit/f4ba24a07d097b0b4c1075ba34ced8195c96d43f))
* split services to use Deferred services ([#5](https://github.com/Hann0T/laravel-webauthn/issues/5)) ([ec651e5](https://github.com/Hann0T/laravel-webauthn/commit/ec651e55e98d2ba735ad115f44d156eb3f5c970e))
* use bigInteger for foreign key reference ([#145](https://github.com/Hann0T/laravel-webauthn/issues/145)) ([3215a84](https://github.com/Hann0T/laravel-webauthn/commit/3215a84657241b2a441987cff20cbd1579be7830))
* use safe php functions ([#25](https://github.com/Hann0T/laravel-webauthn/issues/25)) ([442e093](https://github.com/Hann0T/laravel-webauthn/commit/442e0938f7ebc2aadfbaa7f20b3aeda97fa50f32))
* **wip:** 500 Error with web-auth/webauthn-lib 4.5.0. ([f793ba2](https://github.com/Hann0T/laravel-webauthn/commit/f793ba20d21d2235df3392c9ba7acd7129329ac4))
* **wip:** auth on safari. ([473900b](https://github.com/Hann0T/laravel-webauthn/commit/473900bcb5af58e3787bde8b6ab1c35e1eac04ce))

## [3.2.4](https://github.com/asbiin/laravel-webauthn/compare/3.2.3...3.2.4) (2022-09-10)


### Bug Fixes

* fix attestation validation by re-encoding response.clientDataJSON ([#405](https://github.com/asbiin/laravel-webauthn/issues/405)) ([7956958](https://github.com/asbiin/laravel-webauthn/commit/79569586790c0df0b1953dfb917d6f6d376be65e))

## [3.2.3](https://github.com/asbiin/laravel-webauthn/compare/3.2.2...3.2.3) (2022-09-06)


### Bug Fixes

* fix authenticatorData format ([#402](https://github.com/asbiin/laravel-webauthn/issues/402)) ([155ae8c](https://github.com/asbiin/laravel-webauthn/commit/155ae8cd2fea1cee5dd0fc0f28ca1d539d80392f))

## [3.2.2](https://github.com/asbiin/laravel-webauthn/compare/3.2.1...3.2.2) (2022-08-20)


### Bug Fixes

* no timestamp update when updating a key ([#397](https://github.com/asbiin/laravel-webauthn/issues/397)) ([0561054](https://github.com/asbiin/laravel-webauthn/commit/05610549427974bf8a3f0cc32a58e4050d9f7792))

## [3.2.1](https://github.com/asbiin/laravel-webauthn/compare/3.2.0...3.2.1) (2022-08-20)


### Bug Fixes

* fix credentialId migration type ([#396](https://github.com/asbiin/laravel-webauthn/issues/396)) ([ea63d70](https://github.com/asbiin/laravel-webauthn/commit/ea63d70bcc2733526fb8e72af5c5511cd301d899))

## [3.2.0](https://github.com/asbiin/laravel-webauthn/compare/3.1.0...3.2.0) (2022-07-30)


### Features

* add WebauthnAuthenticatable trait ([#393](https://github.com/asbiin/laravel-webauthn/issues/393)) ([747df5a](https://github.com/asbiin/laravel-webauthn/commit/747df5ab7bf0f88bbb36f11c0f281464d6c29d0b))

## [3.1.0](https://github.com/asbiin/laravel-webauthn/compare/3.0.1...3.1.0) (2022-07-30)


### Features

* add login event on eloquent provider login ([#392](https://github.com/asbiin/laravel-webauthn/issues/392)) ([16a720e](https://github.com/asbiin/laravel-webauthn/commit/16a720ea15cca233c3c670b1532650d8a1a5d665))

## [3.0.1](https://github.com/asbiin/laravel-webauthn/compare/3.0.0...3.0.1) (2022-06-01)


### Bug Fixes

* json serialize publickey for cache store ([#385](https://github.com/asbiin/laravel-webauthn/issues/385)) ([1b6ad1b](https://github.com/asbiin/laravel-webauthn/commit/1b6ad1b719ae70c850dffaa24d676b2f63b346b2))

# [3.0.0](https://github.com/asbiin/laravel-webauthn/compare/2.0.1...3.0.0) (2022-04-22)


### Bug Fixes

* fix base64 padding ([#381](https://github.com/asbiin/laravel-webauthn/issues/381)) ([6ce3783](https://github.com/asbiin/laravel-webauthn/commit/6ce37830ec89881a75b1d9afffedff57237e92e9))


### Features

* add login without password, and some rewrite ([#361](https://github.com/asbiin/laravel-webauthn/issues/361)) ([6778707](https://github.com/asbiin/laravel-webauthn/commit/6778707b546a9fbd64e5bc0e31091acd1302c749))
* Add support to Laravel 9.x, and remove Laravel 7.x and 8.x ([#377](https://github.com/asbiin/laravel-webauthn/issues/377)) ([bf6c54a](https://github.com/asbiin/laravel-webauthn/commit/bf6c54a27735def337e296cde9de126d131d861f))
* require php 8.1+ ([#378](https://github.com/asbiin/laravel-webauthn/issues/378)) ([af83780](https://github.com/asbiin/laravel-webauthn/commit/af837802ca436d21e15f1b47ca2724ee7b1aaf70))


### BREAKING CHANGES

* options (`webauthn.auth.options` and `webauthn.store.options`) routes are now POST. GET routes are reserved for the views (`webauthn.login` and `webauthn.create`). `webauthn.auth` and `webauthn.store` routes must send data flatten. See details in https://github.com/asbiin/laravel-webauthn/blob/main/docs/migration-v2-to-v3.md .
- `LoginViewResponse` contract has now a `setPublicKey` method
- `RegisterSuccessResponse` contract has now a `setWebauthnKey` method
- `RegisterViewResponse` contract has now a `setPublicKey` method
- `Webauthn::login()` now takes 1 argument for `$user`: `login(\Illuminate\Contracts\Auth\Authenticatable $user)`

## [2.0.1](https://github.com/asbiin/laravel-webauthn/compare/2.0.0...2.0.1) (2022-02-19)


### Bug Fixes

* fix RegisterViewResponse ([#362](https://github.com/asbiin/laravel-webauthn/issues/362)) ([d3a7f9b](https://github.com/asbiin/laravel-webauthn/commit/d3a7f9b9410021b84fd86b86fa77f4d2b41cc15a))

# [2.0.0](https://github.com/asbiin/laravel-webauthn/compare/1.2.0...2.0.0) (2022-02-05)


### Features

* rewrite for more customizable library ([#355](https://github.com/asbiin/laravel-webauthn/issues/355)) ([424caae](https://github.com/asbiin/laravel-webauthn/commit/424caae085bed85781ad7eef8904d644517d02f2))


### BREAKING CHANGES

* This new version is a rewrite with a lot of breaking changes, see details in https://github.com/asbiin/laravel-webauthn/blob/main/docs/migration-v1-to-v2.md

# [1.2.0](https://github.com/asbiin/laravel-webauthn/compare/1.1.0...1.2.0) (2021-12-20)


### Features

* update guzzlehttp/psr7 requirement to || ^2.0 ([#350](https://github.com/asbiin/laravel-webauthn/issues/350)) ([8fe8c8a](https://github.com/asbiin/laravel-webauthn/commit/8fe8c8a77b0967d272a89cf7f8eb5ebed8434a6b))

# [1.1.0](https://github.com/asbiin/laravel-webauthn/compare/1.0.0...1.1.0) (2021-07-03)


### Features

* use host without port for RP ID ([#339](https://github.com/asbiin/laravel-webauthn/issues/339)) ([b957ef8](https://github.com/asbiin/laravel-webauthn/commit/b957ef8d8dd9a0b9a119f1bb97e855bf9f61ac22))

## 1.0.0 — 2020-12-30

 * Major release 1.0.0

## 0.9.1 — 2020-12-30
 ### Fixes:
  * Securing the register route from unchecked users

## 0.9.0 — 2020-09-10
 ### Enhancements:
  * Update dependency for Laravel 8
  * Remove composer.lock
  * Update README doc

## 0.8.0 — 2020-03-07
 ### New features:
  * Add French and German languages

 ### Enhancements:
  * Support Laravel 7 and higher
  * Upgrade to WebAuthn v3.0

## 0.7.0 — 2019-12-05
 ### New features:
  * Make the callback url setable by the user before the middleware hit

## 0.6.4 — 2019-11-16
 ### Enhancements:
  * Add suggestions for web-token/jwt-signature-algorithm-* dependencies

 ### Fixes:
  * Fix Uuid decode

## 0.6.3 — 2019-10-12
 ### Enhancements:
  * Upgrade to Laravel 6.x

## 0.6.2 — 2019-10-08
 ### Fixes:
  * Fix javascript base64url decode function

## 0.6.1 — 2019-09-20
 ### Fixes:
  * Fix aaguid parsing

## 0.6.0 — 2019-09-19
 ### Enhancements:
  * Upgrade to webauthn-lib v2.x

 ### Fixes:
  * Use bigInteger for foreign key reference

## 0.5.1 — 2019-05-20
 ### Fixes:
  * Fix google safetynet config test
  * Remove Guzzle6 direct dependency

## 0.5.0 — 2019-05-03
 ### Enhancements:
  * Name the destroy route
  * Add Google Safetynet Apikey config

 ### Fixes:
  * Remove use of empty() php function
  * Remove deprecated methods

## 0.4.1 — 2019-04-18
 ### Fixes:
  * Fix javascript resource in case no key is registered yet

## 0.4.0 — 2019-04-18
 ### New features:
  * Add resources files to client adoption
  * Add register and auth example pages

 ### Enhancements:
  * Add callback URL in session

 ### Fixes:
  * Use safe php functions
  * Fix redirect guest callback

## 0.3.0 — 2019-04-08
 ### New features:
  * Add WebauthnLoginData event
  * Add new redirects

 ### Fixes:
  * Fix Webauthn Facade

## 0.2.0 — 2019-04-06
 ### Enhancements:
  * Remove userHandle in model
  * Return a resource after registering
  * Update to web-auth v1.1.0

 ### Fixes:
  * Fix some contract bindings
  * Split services to use Deferred services

## 0.1.0 — 2019-04-04
 ### New features:
  * First release
