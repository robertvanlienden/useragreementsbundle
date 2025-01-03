# Robert van Lienden - User Agreements Bundle
![GitLab CI](https://github.com/robertvanlienden/useragreementsbundle/actions/workflows/workflow.yaml/badge.svg)
[![codecov](https://codecov.io/github/robertvanlienden/useragreementsbundle/graph/badge.svg?token=Z00BLSB0LQ)](https://codecov.io/github/robertvanlienden/useragreementsbundle)

A bundle to make user agreements simple.

Configure agreements, make them simple available with 1 form type and save the accepted agreements in the database.

## Configuration

Put this in your `config/packages/user_agreements.yaml`

```yaml
user_agreements:
  agreements:
    - id: "checkbox_field_id" ## ID for checkbox field
      label: 'I agree with the terms and conditions' ## Label for the form field
      route_name: 'terms_conditions_page' ## Symfony route name to the agreement
      required: true ## Required agreement or optional
      version: '1.0' ##Optional
```

### More options
[Read the docs for all options.](docs/00-index.md)

## Donations
Want to support me creating stuff like this? Consider donating with [PayPal](https://www.paypal.me/robertvanlienden).