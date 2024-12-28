## Robert van Lienden - User Agreements Bundle
### Development/alpha release
A bundle to make user agreements simple.

Configure agreements, make them simple available with 1 form type and save the accepted agreements in the database.

## Development/alpha release
If you want to use this, please pin the used release on some specific commit hash.

Right now this bundle is under development.

## Configuration

```yaml
user_agreements:
  agreements:
    - label: 'I agree with the terms and conditions' ## Label for form
      route_name: 'terms_conditions_page'
      required: true
      version: '1.0' ##Optional
```

## To-do
- [x] Make user agreements form type and make them configurable
- [ ] Save accepted agreements with User entity
- [ ] Add codestyling
- [ ] Add tests (...)