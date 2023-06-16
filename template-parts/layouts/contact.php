<?php
    $headline = get_sub_field('headline');
    $subline = get_sub_field('subline');
    $name = get_sub_field('name');
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $image = get_sub_field('image');
    $alt_text = get_post_meta($image , '_wp_attachment_image_alt', true);

?>
<div class="row py-3 py-lg-5 contact" id="contact">
    <div class="col-12 col-lg-12 py-3 py-lg-5">
        <div class="row text-center">
            <div class="col">
                <div class="h6 pt-1 pb-1 text-primary text-uppercase">
                    <?= $subline; ?>
                </div>
                <div class="h2 pt-1 pb-1">
                    <?= $headline;?>
                </div>
                </div>
            </div>
        <div class="row py-lg-4 d-flex justify-content-between"> 
            <div class="col-lg-5 col-12 mb-sm-5 mb-md-0 mb-lg-0 testimonial-user-col rounded p-4 p-lg-5">
                <img src="<?= wp_get_attachment_image_url($image, 'large');?>" class="rounded mb-3" alt="<?= $alt_text;?>">
                <div class="h3 pb-1">
                    <? $name;?>
                </div>
                <div class="h5 pb-1">
                    <? $title; ?>
                </div>
                <div class="p pb-3">
                    <?= $text;?>
                </div>
                <?php if( have_rows('socials')): ?>
                    <ul class="list-group list-group-horizontal list-hero">
                        <?php while( have_rows('socials') ): the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('url');
                        ?>
                        <a href="<?= $url; ?>"> <li class="list-group-item bg-black rounded me-2 shadow">
                            <i class="bi bi-<?= $icon; ?> rounded-circle bg-dark text-primary"></i>
                        </li></a>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
            </div>
            <div class="col-lg-6 col-12 testimonial-user-col p-4 p-lg-5 rounded">
                <form id="form-id" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
                    <!-- Real Fields -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="yourName" class="form-label text-uppercase h6">Your Name</label>
                            <input type="text" class="form-control" aria-label="Your Name" id="nameqwer" name="nameqwer"> 
                        </div>
                        <div class="col">
                            <label for="phoneNumber" class="form-label text-uppercase h6">Phone Number</label>
                            <input type="text" class="form-control" aria-label="Phone Number" id="phoneqwer" name="phoneqwer">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-uppercase h6">Email address *</label>
                        <input type="email" class="form-control" id="emailqwer" name="emailqwer" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">I'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label text-uppercase h6">Subject</label>
                        <input type="text" class="form-control" id="subjectqwer" name="subjectqwer">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label text-uppercase h6">Your Message</label>
                        <textarea class="form-control" id="messageqwer" name="messageqwer" rows="3"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="checkqwer" name="checkqwer" required>
                        <label class="form-check-label" for="exampleCheck1">I have read and accept the privacy policy.</label>
                    </div>
                    <!-- Real Fields end -->
                    <!-- Honeypot -->
                    <div class="mb-3">
                        <input type="text" class="ohnohoney" autocomplete="off" id="name" placeholder="Your Name" name="name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="ohnohoney" autocomplete="off" id="phone" placeholder="Phone Number" name="phone">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="ohnohoney" autocomplete="off" id="email" aria-describedby="emailHelp" placeholder="Email" name="email">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="ohnohoney" autocomplete="off" id="subject" placeholder="Subject" name="subject">
                    </div>
                    <div class="mb-3">
                        <textarea class="ohnohoney" autocomplete="off" id="message" rows="3" placeholder="Your Message" name="message"></textarea>
                    </div>
                    <!-- Honeypot end -->
                    <input type="hidden" name="action" value="form_submit_action">
                    <button type="submit" class="btn w-100 form-submit">Send Message</button>
                </form>
                <?php if ( filter_input( INPUT_GET, 'kontaktformular' ) === 'gesendet' ) : ?>
                    <div class="alert alert-success mt-5" role="alert">
                    The form was sent successfully.
                    </div>
                <?php endif ?>
            </div>
        </div>
        
    </div>
</div>