# Robert van Lienden - User Agreements Bundle
A bundle to make user agreements simple.

Configure agreements, make them simple available with 1 form type and save the accepted agreements in the database.

## Configuration

Put this in your `config/packages/user_agreements.yaml`

```yaml
user_agreements:
  agreements:
    - label: 'I agree with the terms and conditions' ## Label for form. Without any special characters because of technical limitations.
      route_name: 'terms_conditions_page' ## Symfony route name to the agreement
      required: true ## Required agreement or optional
      version: '1.0' ##Optional
```

### More options
[Read the docs for all options.](docs/00-index.md)

## To-do
- [ ] Add codestyling/PHPStan
- [ ] Add some unit tests

## Donations
Want to support me creating stuff like this? Consider donating with [PayPal](https://www.paypal.me/robertvanlienden).