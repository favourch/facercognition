# Facerecognition

Facerecognition using Kairos API for Facial Recognition.


# Before you start

  - Signup and get and API [https://www.kairos.com/docs/]
  - Apache Server Running


### NECESSARY PARAMETERS FOR UPLOADING AND RECOGNIZING IMAGE


* "image"   :   === post image url / image blob or / base64 image
* "subject_id":   === unique idenitifier for image uploaded which is used to search first when recognizing an image
* "gallery_name":    === gallery name in which you will be uploading/searching the photo

see full docs  @KAIROS   [ https://kairos.docs.apiary.io/#reference/face-recognition/enroll/post ]

### Installation


```sh
* Clone this repo
* extract to server root
* navigate to localhost/project_folder
```