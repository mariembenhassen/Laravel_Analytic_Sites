console.log('track.js STARTED loading');

(function() {
    console.log('Inside IIFE - script is running');

    // Find the current <script> tag that loaded this code
    const scripts = document.getElementsByTagName('script');
    const currentScript = scripts[scripts.length - 1];  // last script loaded = this one

    // Get its src attribute
    const src = currentScript.src;
    console.log('Script src:', src);

    // Parse the query parameters from src
    const scriptUrl = new URL(src);
    const key = scriptUrl.searchParams.get('key');
    console.log('Extracted key from script src:', key);

    if (!key) {
        console.log('No key found in script src → script stops here');
        return;
    }

    console.log('Key exists → collecting data');

    const data = {
        page_url: window.location.href,
        device_type: /Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? 'mobile' : 'desktop',
        browser: navigator.userAgent,
    };

    console.log('Data prepared:', data);

    console.log('Attempting to send POST request...');

    fetch('/track?key=' + encodeURIComponent(key), {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
    })
        .then(response => {
            console.log('POST response received - status:', response.status);
            if (!response.ok) {
                console.log('POST failed - status text:', response.statusText);
            }
        })
        .catch(err => {
            console.error('POST fetch failed with error:', err.message);
        });

    console.log('POST attempt finished');
})();
