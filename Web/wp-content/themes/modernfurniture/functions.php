<?php

function modern_furniture_enqueue_styles() {
    wp_enqueue_style('modern-furniture', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'modern_furniture_enqueue_styles');

function modern_furniture_enqueue_scripts() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'modern_furniture_enqueue_scripts');

function add_svg_to_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');

function modern_furniture_contact_form_shortcode() {
    ob_start();
    get_template_part('patterns/contact-form');
    return ob_get_clean();
}
add_shortcode('contact_form', 'modern_furniture_contact_form_shortcode');

function ms_handle_contact_form_submission() {
    if (isset($_POST['action']) && $_POST['action'] === 'send_contact_form'){
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);
    
        $errors = [];
    
        if (empty($first_name)) {
            $errors['first_name'] = 'Proszę podać imię.';
        } else if (strlen($first_name) < 2) {
            $errors['first_name'] = 'Imię powinno się składać z przymajniej 3 znaków.';
        }
    
        if (empty($last_name)) {
            $errors['last_name'] = 'Proszę podać nazwisko.';
        } else if (strlen($last_name) < 2) {
            $errors['last_name'] = 'Nazwisko powinno się składać z przymajniej 3 znaków.';
        }
    
        if (empty($email) || !is_email($email)) {
            $errors['email'] = 'Proszę podać prawidłowy adres e-mail.';
        }
    
        if (empty($message)) {
            $errors['message'] = 'Proszę wpisać wiadomość.';
        } else if (strlen($message) < 9) {
            $errors['message'] = 'Wiadomość powinna się składać z przymajniej 10 znaków.';
        }

        if (!empty($errors)) {
            session_start();
            $_SESSION['contact_form_errors'] = $errors;
            $_SESSION['contact_form_old'] = [
                'first_name'    => $first_name,
                'last_name'     => $last_name,
                'email'         => $email,
                'message'       => $message,
            ];
            wp_redirect(wp_get_referer());
            exit;
        }

        $to = get_option('admin_email');
        $subject = "Wiadomość z formularza kontaktowego od " . $first_name . " " . $last_name;
        $body = "Imię: $first_name\nNazwisko: $last_name\nEmail: $email\n\nWiadomość: \n$message";
        $headers = ['Content-Type: text/plain; charset=UTF-8'];

        wp_mail($to, $subject, $body, $headers);

        session_start();
        unset($_SESSION['contact_form_errors']);
        unset($_SESSION['contact_form_old']);
        $_SESSION['contact_form_success'] = 'Twoja wiadomość została wysłana pomyślnie!';
        wp_redirect(wp_get_referer());
        exit;
    }
}
add_action('admin_post_nopriv_send_contact_form', 'ms_handle_contact_form_submission');
add_action('admin_post_send_contact_form', 'ms_handle_contact_form_submission');