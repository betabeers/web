<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 28/01/17
 * Time: 20:21
 */
?>

<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-sponsors text-center">
                    <h3 class="footer-sponsors-title">{{ trans('footer.sponsors') }}</h3>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="footer-links">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 text-center text-md-left">
                        <div class="footer-links-list">
                            <h4>ßetabeers</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.aboutUs') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.headquarters') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.codeOfConduct') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.blog') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 text-center text-md-left">
                        <div class="footer-links-list">
                            <h4>{{ trans('footer.participate') }}</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.organizeEvent') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.presentYourStartup') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 text-center text-md-left">
                        <div class="footer-links-list">
                            <h4>{{ trans('footer.companies') }}</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.lookForDevelopers') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.support') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.sponsor') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 text-center text-md-left">
                        <div class="footer-links-list">
                            <h4>{{ trans('footer.contact') }}</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.contact') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="footer-links-list_item">
                                        {{ trans('footer.press') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="footer-social">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="footer-social-link footer-social-link_twitter">
                                <i class="fa fa-lg fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="footer-social-link footer-social-link_facebook">
                                <i class="fa fa-lg fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="footer-social-link footer-social-link_youtube">
                                <i class="fa fa-lg fa-youtube"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="footer-social-link footer-social-link_linkedin">
                                <i class="fa fa-lg fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="col-12 text-center">
                <div class="footer-copyright">
                    © 2010 - {{ date('Y') }} ßetabeers | {{ trans('footer.allRigtsReserved') }}
                </div>
            </div>
        </div>
    </div>
</footer>
