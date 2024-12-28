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

Now the agreements you have configured will get shown in your form

### Save agreements in database (WIP)
In your `User` class you can implement the following trait;\
`use \RobertvanLienden\UserAgreements\Entity\Traits\UserAgreementTrait;`

If your user is not in `App\Entity\User`, you can configure your own user entity in the `config/packages/user_agreements.yaml`;
```yaml
user_agreements:
  user_entity: 'App\Entity\CustomUserEntity'
```

Now run `bin/console doctrine:migrations:diff` and some migration should be generated with the right data.

#### I don't want to save agreements to my database
Fine, but your next `bin/console doctrine:migrations:diff` will generate some table to store them.
Just leave them as they are. Some empty table would not hurt anybody.

Hating this? Feel free to contribute some PR!

## To-do
- [x] Make user agreements form type and make them configurable
- [x] Configure UserAgreement entity with dynamic settable User relation (OneToMany)
- [ ] Add DateTime to store when the agreement is agree'ed
- [ ] Made option to save accepted agreements within the User entity (Service to handle this?)
- [ ] Write documentation for this (maybe seperate from the README.md)
- [ ] Add codestyling
- [ ] Add tests (...)