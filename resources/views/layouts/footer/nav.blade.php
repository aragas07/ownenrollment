<footer class="footer">
    <div class="container @auth-fluid @endauth">
        <nav>
            <ul class="footer-menu">
                <li>
                    <a href="https://dorsu.edu.ph/" class="nav-link" target="_blank">{{ __('DOrSU Main') }}</a>
                </li>
                <li>
                    <a href="https://dorsu.edu.ph/bec/" class="nav-link" target="_blank">{{ __('Banay-banay Ext.') }}</a>
                </li>
                <li>
                    <a href="https://dorsu.edu.ph/cec/" class="nav-link" target="_blank">{{ __('Cateel Ext.') }}</a>
                </li>
                <li>
                    <a href="https://dorsu.edu.ph/siec/" class="nav-link" target="_blank">{{ __('San Isidro Ext.') }}</a>
                </li>
            </ul>
            <p class="copyright text-center">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="https://dorsu.edu.ph/">{{ __('DoRSU Creations') }}</a>{{ __(', made with love for a better learning.') }}
            </p>
        </nav>
    </div>
</footer>