# Diabetes Desease Classifications

With this application we can clasify our Diabetes Desease, 
the flow is simple, there are 2 users role, patient and admin. Patient can only consultate they symtoms once and must register new account before, to know the result Patient have to ask the administration-man(cashier/nurse/doctor or whatever), they can see profile information page too. Admin's have the capababilities to see list of user profile information and able to delete them, see the result(desease) for Patient symtoms, and adding or remove symtoms.

**NB**: `the application is for education only, you should check-up in hospital for valid result.`
        `There's still undone page(it might).`
## Symtoms Desease
Here is the rules to get Desease classified,


|Diabetes Type-1|Diabetes Type-2|Pregnant Diabetes|
|---------------|---------------|-----------------|
|G01|G14|G01|
|G02|G15|G02|
|G03|G16|G03|
|G05|P02|G05|
|G08||G08|
|G11||G17|
|G13||G18|
|P01||P03|

For your information, the G's or P's value is the symtoms id.

## Demos
### Patient
**Login**
<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://user-images.githubusercontent.com/25423296/163456776-7f95b81a-f1ed-45f7-b7ab-8fa810d529fa.png">
  <source media="(prefers-color-scheme: light)" srcset="https://user-images.githubusercontent.com/25423296/163456779-a8556205-d0a5-45e2-ac17-42d089e3c3f8.png">
  <img alt="Shows an illustrated sun in light mode and a moon with stars in dark mode." src="demos/login_page.png">
</picture>

**Consultation**
<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://user-images.githubusercontent.com/25423296/163456776-7f95b81a-f1ed-45f7-b7ab-8fa810d529fa.png">
  <source media="(prefers-color-scheme: light)" srcset="https://user-images.githubusercontent.com/25423296/163456779-a8556205-d0a5-45e2-ac17-42d089e3c3f8.png">
  <img alt="Shows an illustrated sun in light mode and a moon with stars in dark mode." src="demos/user_consultation_page.png">
</picture>


### Admin

**List user profile information and patient's**
<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://user-images.githubusercontent.com/25423296/163456776-7f95b81a-f1ed-45f7-b7ab-8fa810d529fa.png">
  <source media="(prefers-color-scheme: light)" srcset="https://user-images.githubusercontent.com/25423296/163456779-a8556205-d0a5-45e2-ac17-42d089e3c3f8.png">
  <img alt="Shows an illustrated sun in light mode and a moon with stars in dark mode." src="demos/admin_list_user_profile_page.png">
  <img alt="Shows an illustrated sun in light mode and a moon with stars in dark mode." src="demos/admin_list_user_pasien_page.png">
</picture>

**Add or delete symtoms**
<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://user-images.githubusercontent.com/25423296/163456776-7f95b81a-f1ed-45f7-b7ab-8fa810d529fa.png">
  <source media="(prefers-color-scheme: light)" srcset="https://user-images.githubusercontent.com/25423296/163456779-a8556205-d0a5-45e2-ac17-42d089e3c3f8.png">
  <img alt="Shows an illustrated sun in light mode and a moon with stars in dark mode." src="demos/admin_add_or_delete_symtoms_page.png">
</picture>
