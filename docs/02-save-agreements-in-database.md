# Save agreements in database (WIP)
In your `User` class you can implement the following trait;\
`use \RobertvanLienden\UserAgreements\Entity\Traits\UserAgreementTrait;`

If your user is not in `App\Entity\User`, you can configure your own user entity in the `config/packages/user_agreements.yaml`;
```yaml
user_agreements:
  user_entity: 'App\Entity\CustomUserEntity'
```

Now run `bin/console doctrine:migrations:diff` and some migration should be generated with the right data.

## I don't want to save agreements to my database
Fine, but your next `bin/console doctrine:migrations:diff` will generate some table to store them.
Just leave them as they are. Some empty table would not hurt anybody.

Hating this? Feel free to contribute some PR!