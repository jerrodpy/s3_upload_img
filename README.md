
## Test task

Make a micro web app that will have a form with image file input, and a dropdown field “output” with Four options: 
original image, 
square image (should not deform, add white background for smaller sides), 
small image (256px x 256px), 
“all three” (will save 3 versions of the file). 

After user selected image and type of the output it should send base64 of the image, process and save it to s3 bucket. 
The form should have backend validation: accept only image types, and both fields are required. 
Use any libraries for the task.


## Installation and launch

- git clone https://github.com/jerrodpy/s3_upload_img

execute the artisan commands

- `composer install`
- in .env register the actual data of access to the database + access to AWS
- `php artisan migrate`
- `php artisan serv`

