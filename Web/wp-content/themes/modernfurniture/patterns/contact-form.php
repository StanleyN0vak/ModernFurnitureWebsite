<?php if(!defined('ABSPATH')) exit; ?>

<?php 
    session_start();
    $errors = $_SESSION['contact_form_errors'] ?? [];
    $old = $_SESSION['contact_form_old'] ?? [];
    $success = $_SESSION['contact_form_success'] ?? null;
?>

<?php if (!empty($success)) : ?>
    <script>
        alert("<?php echo esc_js($success); ?>")
    </script>
<?php endif; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 ms-contact-form-wrapper">
            <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="col ms-contact-form">
                <div class="ms-form-group">
                    <label for="first_name">Imię</label>
                    <br>
                    <input type="text" name="first_name" id="first_name" placeholder="Imię" class="w-100" value="<?php echo esc_attr($old['first_name'] ?? '');?>" >
                    <?php if (!empty($errors['first_name'])) : ?>
                        <div class="text-danger"><?php echo esc_html($errors['first_name']); ?></div>
                    <?php endif; ?>
                </div>
                <div class="ms-form-group">
                    <label for="last_name">Nazwisko</label>
                    <br>
                    <input type="text" name="last_name" id="last_name" placeholder="Nazwisko" class="w-100" value="<?php echo esc_attr($old['last_name'] ?? '');?>">
                    <?php if (!empty($errors['last_name'])) : ?>
                        <div class="text-danger"><?php echo esc_html($errors['last_name']); ?></div>
                    <?php endif; ?>
                </div>
                <div class="ms-form-group">
                    <label for="email">Email</label>
                    <br>
                    <input type="email" name="email" id="email" placeholder="Email" class="w-100" value="<?php echo esc_attr($old['email'] ?? '');?>">
                    <?php if (!empty($errors['email'])) : ?>
                        <div class="text-danger"><?php echo esc_html($errors['email']); ?></div>
                    <?php endif; ?>
                </div>
                <div class="ms-form-group">
                    <label for="message">Wiadomość</label>
                    <br>
                    <textarea name="message" id="message" placeholder="Wiadomość" class="w-100" rows="4" value="<?php echo esc_attr($old['message'] ?? '');?>" ></textarea>
                    <?php if (!empty($errors['message'])) : ?>
                        <div class="text-danger"><?php echo esc_html($errors['message']); ?></div>
                    <?php endif; ?>
                </div>

                <input type="hidden" name="action" value="send_contact_form">

                <button type="submit" class="btn w-100 ms-contact-form-btn">Skontaktuj się z nami!</button>
            </form>
            <?php
                unset($_SESSION['contact_form_errors']);
                unset($_SESSION['contact_form_old']);
                unset($_SESSION['contact_form_success']);
            ?>
        </div>
    </div>
</div>