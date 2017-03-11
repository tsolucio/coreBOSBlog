---
title: Subscribe

form:
    name: subscribe

    fields:
        - name: firstname
          label: First Name
          placeholder: Enter your first name
          autofocus: on
          autocomplete: on
          type: text
          validate:
            required: true

        - name: lastname
          label: Last Name
          placeholder: Enter your last name
          autofocus: off
          autocomplete: on
          type: text
          validate:
            required: true

        - name: email
          label: Email
          placeholder: Enter your email address
          type: email
          validate:
            required: true
    buttons:
        - type: submit
          value: Submit
        - type: reset
          value: Reset

    process:
        - email:
            subject: "[coreBOSBlog Suscribe] {{ form.value.firstname|e }} {{ form.value.lastname|e }}"
            body: "{% include 'forms/data.html.twig' %}"
        - save:
            fileprefix: cbsubscribe-
            dateformat: Ymd-His-u
            extension: txt
            body: "{% include 'forms/data.txt.twig' %}"
        - message: Thank you for following us!
        - display: thankyou
---

# Subscribe to our newsletter

Our monthly newsletter will keep you informed of the important events that happen to coreBOS!
