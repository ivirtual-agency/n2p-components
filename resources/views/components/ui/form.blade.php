@props([
    'portalId' => config('net2phone.hubspot.portal_id'),
    'formId' => config('net2phone.hubspot.default_form_id'),
    'googleAnalyticsEvent' => 'generate_lead'
])

@pushOnce('head')
    <!--[if lte IE 8]> 
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script> 
    <![endif]-->
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
    <script>
        function getValueFromHubspotForm(form, name) {
            var element = form.find(element => element.name === name);
            return element ? element.value : '';
        }
    </script>
@endPushOnce

<script>
    hbspt.forms.create({
        portalId: "{{ $portalId }}",
        formId: "{{ $formId }}",
        onFormSubmit: function(form, eventData) {
        
            let userData = {
                'email': getValueFromHubspotForm(eventData, 'email'),
                'phone_number': '{{ config('net2phone.google.user_data.phone_prefix', '') }}' + getValueFromHubspotForm(eventData, 'phone'),
                'address': {
                    'first_name': getValueFromHubspotForm(eventData, 'firstname'),
                    'last_name': getValueFromHubspotForm(eventData, 'lastname'),
                    'city': getValueFromHubspotForm(eventData, 'city'),
                    'region': getValueFromHubspotForm(eventData, 'state'),
                    'country': '{{ config('net2phone.google.user_data.country') }}',
                }
            };

            if (typeof gtag !== 'undefined') {
                gtag('set', 'user_data', userData);

                gtag('event', '{{ $googleAnalyticsEvent }}', {
                    'city': userData.address.city,
                    'region': userData.address.region,
                    'country': userData.address.country,
                });
            }

            if (typeof fbq !== 'undefined') {
                fbq('track', 'Contact', {
                    'city': userData.address.city,
                    'region': userData.address.region,
                    'country': userData.address.country,
                });
            }
        }
    });
</script>



