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

### Form type
Use the following snippet to add agreements to the form you want;

```php
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('agreements', AgreementFormType::class, [
                'label' => 'All agreements you can sign',
                'mapped' => false,
            ])
        ;
    }
```

Now the agreements you have configured 

## To-do
- [x] Make user agreements form type and make them configurable
- [ ] Made option to save accepted agreements within the User entity
- [ ] Add codestyling
- [ ] Add tests (...)