# Form type
Use the following snippet to add agreements to the form you want;

```php
use RobertvanLienden\UserAgreements\Form\AgreementFormType;

// ...
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

After adding this FormType, you can just configure your agreements as written in the [README.md](../README.md).

Now your form contain all agreements you have configured!