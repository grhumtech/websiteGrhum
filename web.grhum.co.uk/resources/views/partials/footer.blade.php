<style>
    .luxury-footer {
        background:
            radial-gradient(circle at top left, rgba(194,160,107,.14), transparent 34%),
            linear-gradient(180deg, #16261E 0%, #0F1B15 100%);
        color: #F6F1E8;
        font-family: inherit;
    }

    .luxury-footer a {
        color: rgba(246,241,232,.72);
        text-decoration: none;
        transition: color .25s ease, transform .25s ease;
    }

    .luxury-footer a:hover {
        color: #C2A06B;
        transform: translateX(4px);
    }

    .footer-wrap {
        max-width: 1240px;
        margin: 0 auto;
        padding: 86px 32px 46px;
        display: grid;
        grid-template-columns: 1.7fr 1fr 1.15fr 1fr;
        gap: 48px;
    }

    .footer-brand {
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        font-size: 34px;
        letter-spacing: .24em;
        color: #F6F1E8;
        margin-bottom: 18px;
    }

    .footer-brand-line {
        width: 54px;
        height: 1px;
        background: #C2A06B;
        margin-bottom: 22px;
    }

    .footer-text {
        font-size: 15px;
        line-height: 1.75;
        color: rgba(246,241,232,.62);
        max-width: 315px;
        margin: 0;
    }

    .footer-title {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: #C2A06B;
        margin: 0 0 22px;
    }

    .footer-links {
        display: flex;
        flex-direction: column;
        gap: 13px;
        font-size: 14px;
        color: rgba(246,241,232,.72);
    }

    .footer-address {
        line-height: 1.65;
        color: rgba(246,241,232,.68);
    }

    .footer-bottom {
        border-top: 1px solid rgba(246,241,232,.12);
        background: rgba(0,0,0,.12);
    }

    .footer-bottom-inner {
        max-width: 1240px;
        margin: 0 auto;
        padding: 24px 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        font-size: 13px;
        color: rgba(246,241,232,.55);
    }

    .footer-legal {
        display: flex;
        gap: 22px;
        flex-wrap: wrap;
    }

    @media (max-width: 900px) {
        .footer-wrap {
            grid-template-columns: 1fr 1fr;
            padding-top: 64px;
        }
    }

    @media (max-width: 560px) {
        .footer-wrap {
            grid-template-columns: 1fr;
            gap: 36px;
            padding: 56px 22px 36px;
        }

        .footer-bottom-inner {
            padding: 22px;
            align-items: flex-start;
            flex-direction: column;
        }

        .footer-legal {
            gap: 14px;
            flex-direction: column;
        }
    }
</style>

<footer class="luxury-footer">
    <div class="footer-wrap">
        <div>
            <div class="footer-brand">GRHUM</div>
            <div class="footer-brand-line"></div>
            <p class="footer-text">
                Serviced accommodation that feels refined, effortless, and truly at home — across 60+ destinations in the UK &amp; Ireland.
            </p>
        </div>

        <div>
            <h4 class="footer-title">Quick links</h4>
            <div class="footer-links">
                <a href="{{ route('who_we_are') }}">About us</a>
                <a href="{{ route('locations') }}">Locations</a>
                <a href="">Blogs</a>
                <a href="">FAQ's</a>
                <a href="{{ route('contact_us') }}">Contact us</a>
            </div>
        </div>

        <div>
            <h4 class="footer-title">Get in touch</h4>
            <div class="footer-links">
                <a href="tel:+442080507656">(+44) 020 8050 7656</a>
                <a href="mailto:info@grhum.co.uk">info@grhum.co.uk</a>
                <span class="footer-address">
                    3 Sussex House, Stratton Close, Edgware, England, HA8 6PY
                </span>
            </div>
        </div>

        <div>
            <h4 class="footer-title">Connect</h4>
            <div class="footer-links">
                <a href="https://www.facebook.com/grhumltd">Facebook</a>
                <a href="https://www.instagram.com/grhum_ltd/">Instagram</a>
                <a href="https://x.com/GrhumLtd">X / Twitter</a>
                <a href="https://www.linkedin.com/company/grhum-ltd/">LinkedIn</a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-inner">
            <span>© {{ date('Y') }} GRHUM LTD. All rights reserved.</span>

            <div class="footer-legal">
                <a href="https://www.grhum.co.uk/client_terms_conditions">Client terms</a>
                <a href="https://www.grhum.co.uk/website_terms_condition">Website terms</a>
                <a href="https://www.grhum.co.uk/privacy_policy">Privacy policy</a>
            </div>
        </div>
    </div>
</footer>