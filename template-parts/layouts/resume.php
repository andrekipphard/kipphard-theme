<?php
    $headline = get_sub_field('headline');
    $subline = get_sub_field('subline');
    $text = get_sub_field('text');
    $education_start_date = get_sub_field('education_start_date');
    $education_finish_date = get_sub_field('education_finish_date');
    $work_experience_start_date = get_sub_field('work_experience_start_date');
    $work_experience_finish_date = get_sub_field('work_experience_finish_date');
?>
<div class="row pb-5 pt-5 border-bottom resume" id="resume">

    <div class="col-12 col-lg-12 pt-5 pb-5">

        <div class="row pb-1 pt-2 h6 text-primary text-center text-uppercase">

            <div class="col">

                <?= $subline;?>

            </div>

        </div>

        <div class="row pb-1 pt-1 h2 text-center">

            <div class="col">

                <?= $headline;?>
            
            </div>

        </div>
        <div class="row pt-4 pb-4">

            <div class="col text-center">
                <p class="text-light"><?= $text;?></p>
            </div>

        </div>

        <div class="row pb-4 pt-4">

            <ul class="nav nav-tabs nav-justified border-0 ms-0 pe-0" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">

					<button class="nav-link active border-0 p-4" id="work-experience" data-bs-toggle="tab" data-bs-target="#work-experience-tab-pane" type="button" role="tab" aria-controls="work-experience-tab-pane" aria-selected="true">Work Experience</button>
				
                </li>

				<li class="nav-item" role="presentation">

					<button class="nav-link border-0 p-4" id="education" data-bs-toggle="tab" data-bs-target="#education-tab-pane" type="button" role="tab" aria-controls="education-tab-pane" aria-selected="true">Education</button>
				
                </li>


			</ul>
            
			<div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane active" id="work-experience-tab-pane" role="tabpanel" aria-labelledby="work-experience" tabindex="1">
					
                    <section class="timeline_area section_padding_130">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <!-- Section Heading-->
                                    <div class="section_heading text-center">
                                        <div class="h6 text-primary text-center text-uppercase">
                                        <?= $work_experience_start_date;?> - <?= $work_experience_finish_date;?>
                                        </div>
                                        <div class="h3">
                                            Work Experience Timeline
                                        </div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Timeline Area-->
                                    <div class="apland-timeline-area">
                                        <?php if( have_rows('experience')):
                                            while( have_rows('experience')): the_row();
                                            $date = get_sub_field('date');
                                            $topic = get_sub_field('topic');
                                            $place = get_sub_field('place');
                                            $content = get_sub_field('content');
                                        ?>
                                        <!-- Single Timeline Content-->
                                        <div class="single-timeline-area">
                                            <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                                <div class="h6 text-primary text-uppercase mb-0">
                                                    <?= $date;?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-10 col-lg-10">
                                                    <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                        <div class="timeline-text">
                                                            <div class="h4">
                                                                <?= $topic; ?>
                                                            </div>
                                                            <div class="h6 text-primary mb-4">
                                                                <?= $place; ?>
                                                            </div>
                                                            <p><?= $content; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                endwhile;
                                            endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

				</div>
				<div class="tab-pane" id="education-tab-pane" role="tabpanel" aria-labelledby="education" tabindex="0">
					
                    <section class="timeline_area section_padding_130">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <!-- Section Heading-->
                                    <div class="section_heading text-center">
                                        <div class="h6 text-primary text-center text-uppercase">
                                        <?= $education_start_date;?> - <?= $education_finish_date;?>
                                        </div>
                                        <div class="h3">
                                            Education Timeline
                                        </div>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Timeline Area-->
                                    <div class="apland-timeline-area">
                                    <?php if( have_rows('education')):
                                        while( have_rows('education')): the_row();
                                        $date = get_sub_field('date');
                                        $topic = get_sub_field('topic');
                                        $place = get_sub_field('place');
                                        $content = get_sub_field('content');
                                    ?>
                                        <!-- Single Timeline Content-->
                                        <div class="single-timeline-area">
                                            <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                                <div class="h6 text-primary text-uppercase mb-0">
                                                    <?= $date;?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-10 col-lg-10">
                                                    <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                        <div class="timeline-text">
                                                            <div class="h4">
                                                                <?= $topic; ?>
                                                            </div>
                                                            <div class="h6 text-primary mb-4">
                                                                <?= $place; ?>
                                                            </div>
                                                            <p><?= $content; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                                endwhile;
                                            endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

				</div>

            </div>

        </div>

    </div>

</div>