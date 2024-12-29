## Robert van Lienden - User Agreements Bundle
### Development/alpha release
A bundle to make user agreements simple.

Configure agreements, make them simple available with 1 form type and save the accepted agreements in the database.

## Development/alpha release
If you want to use this, please pin the used release on some specific commit hash.

Right now this bundle is under development.

## Configuration

Put this in your `config/packages/user_agreements.yaml`

```yaml
user_agreements:
  agreements:
    - label: 'I agree with the terms and conditions' ## Label for form
      route_name: 'terms_conditions_page' ## Symfony route name to the agreement
      required: true ## Required agreement or optional
      version: '1.0' ##Optional
```

### More options
[Read the docs for all options.](docs/00-index.md)

## To-do
- [x] Make user agreements form type and make them configurable
- [x] Configure UserAgreement entity with dynamic settable User relation (OneToMany)
- [x] Add DateTime to store when the agreement is agree'ed
- [ ] Made option to save accepted agreements within the User entity (Service to handle this?)
- [ ] Write documentation for this (maybe seperate from the README.md)
- [ ] Add codestyling
- [ ] Add tests (...)