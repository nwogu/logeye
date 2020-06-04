<?php

return [
    "login" => [
        "meta_title" => "Login",
        "headline" => "Welcome back!",
        "footer-headline" => "Don't have an account? <a href=\":link_url\">:link_name</a> ",
        "meta_description" => "Logeye - Centralized Logging for Laravel Apps"
    ],
    "register" => [
        "meta_title" => "Create an Account",
        "meta_description" => "Logeye - Centralized Logging for Laravel Apps",
        "headline" => "Create Your Account",
        "footer-headline" => "Already have an account? <a href=\":link_url\">:link_name</a> "
    ],
    "settings" => [
        "h1" => "Settings",
        "meta_title" => "Settings",
        "meta_description" => "You can set up your profile, update settings and change private account data.",
        "form" => [
            "user" => [
                "send_btn" => "Update",
                "email" => "Email",
                "name" => "Name",
                "company" => "Company",
                "website" => "Website",
                "phone" => "Phone",
                "token" => "API Token",
                "_token" => "API Token"
            ]
        ],
        "change_photo" => "change photo",
        "modal" => [
            "password" => [
                "title" => "Change password",
                "send_btn" => "Save",
                "password_current" => "Current password",
                "password" => "Password",
                "password_confirmation" => "Confirm Password"
            ]
        ],
        "notify" => [
            "update" => "User data successfully updated",
            "password" => "Password successfully updated"
        ]
    ],
    "reset_password" => [
        "meta_title" => "Reset password",
        "meta_description" => "Logeye - Central Logging for your laravel apps",
        "headline_pre" => "Reset password",
        "headline_pre_subtitle" => "Enter your email address you used to register. Number of messages is limited.",
        "footer-headline" => "<a href=\":link_url\">:link_name</a> "
    ],
    "tour" => [

    ],
    "alerts" => [
        "install_demo" => ""
    ],
    "logs" => [
        "h1" => "logs",
        "meta_title" => "Logs",
        "meta_description" => "All Logs",
        "filter" => [
            "name" => "Name",
            "message" => "Message",
            "site" => "Site"
        ],
        "table" => [
            "mobile" => [
                "updated" => "Last update"
            ],
            "col" => [
                "name" => "Name",
                "date" => "Date",
                "level" => "Level",
                "message" => "Message",
                "site" => "Site"
            ]
        ],
        "modal_add" => [
            "name" => "Name"
        ]
    ],
    "filter" => [
        "sort_by" => "Sort by",
        "title" => "Filter"
    ],
    "log" => [
        "date" => "Date",
        "level" => "Level",
        "message" => "Message",
        "site_name" => "Site"
    ],
    "sites" => [
        "h1" => "sites",
        "meta_title" => "Sites",
        "meta_description" => "All Sites",
        "filter" => [
            "name" => "Name"
        ],
        "table" => [
            "mobile" => [
                "updated" => "Last update"
            ],
            "col" => [
                "name" => "Name",
                "callback" => "Web Url",
                "created_at" => "Created"
            ]
        ],
        "modal_add" => [
            "name" => "Name",
            "callback" => "Web Url"
        ],
        "notify" => [
            "store" => "New site was successfully created",
            "update" => "site was successfully updated"
        ],
        "modal" => [
            "edit_site" => [
                "title" => "Edit site",
                "name" => "Name",
                "callback" => "Web Url"
            ]
        ]
    ],
    "site" => [
        "info" => [
            "name" => "Name",
            "callback" => "Web Url",
            "edit" => "Edit"
        ]
    ]
];
