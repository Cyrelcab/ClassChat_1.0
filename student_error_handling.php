<?php

    if ($id_exist_error != null) {
    ?><style>
            .id_exist_error {
                display: block;
            }

            label#id_number_label.error-input {
                color: #dc3545;
            }

            #idNumberStudentSignup.error-input {
                border-color: #dc3545;
            }
        </style><?php
            }
            if ($email_exist_error != null) {
                ?><style>
            .email_exist_error {
                display: block;
            }

            #emailStudentSignup.error-input {
                border-color: #dc3545;
            }

            label#email_label.error-input {
                color: #dc3545;
            }
        </style><?php
            }
            if ($id_error != null) {
                ?><style>
            .id_error {
                display: block
            }

            #idNumberStudentSignup.error-input, #employeeNumberSignup.error-input {
                border-color: #dc3545;
            }

            label#id_number_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                if ($name_error != null) {
                    ?><style>
            .name_error {
                display: block;
            }

            #nameStudentSignup.error-input, #nameEmployeeSignup.error-input {
                border-color: #dc3545;
            }

            label#name_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                if ($email_error != null) {
                    ?><style>
            .email_error {
                display: block;
            }

            #emailStudentSignup.error-input, #emailEmployeeSignup.error-input {
                border-color: #dc3545;
            }

            label#email_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                if ($password_error != null) {
                    ?><style>
            .password_error {
                display: block;
            }

            #passwordStudentSignup.error-input, #passwordEmployeeSignup.error-input {
                border-color: #dc3545;
            }

            label#password_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                if ($confirm_password_error != null) {
                    ?><style>
            .confirm_password_error {
                display: block;
            }

            #confirmPasswordStudentSignup.error-input, #confirmPasswordEmployeeSignup.error-input {
                border-color: #dc3545;
            }

            label#confirm_password_label.error-input {
                color: #dc3545;
            }
        </style> <?php
                }
                    ?>