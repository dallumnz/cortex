@if(!empty(Setting::get('google-measurement-id')))
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ Setting::get('google-measurement-id') }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ Setting::get('google-measurement-id') }}');
</script>
@endif