<script>
    (function() {
        const _KEYS = ["gclid", "yclid", "fbclid", "msclkid"];
        const _LPU = "https://cardloan-navi.net/";
        const _LPTU = "./route_tag.php?";
        const _ATTRN = "href";
        const _OPSL = ["^=", "=", "*="];
        const _OPSV = 0;

        function getUrlParams() {
            const params = new URLSearchParams(location.search);
            const result = {};
            _KEYS.forEach(key => {
                const value = params.get(key);
                if (value) result[key] = value;
            });
            return result;
        }

        function updateStorage(params) {
            Object.entries(params).forEach(([key, value]) => {
                localStorage.setItem(`AC_${key}`, value);
                document.cookie = `AC_${key}=${decodeURIComponent(value)}; expires=${new Date(Date.now() + 63072000000).toUTCString()}`;
            });
        }

        function updateLinks(params) {
            if (Object.keys(params).length === 0) return;
            
            const links = document.querySelectorAll(`a[${_ATTRN}${_OPSL[_OPSV]}"${_LPU}"]`);
            if (!links.length) return;

            const queryString = Object.entries(params)
                .map(([key, value]) => `${key}=${encodeURIComponent(value)}`)
                .join('&');

            links.forEach(link => {
                const url = new URL(link.href);
                Object.entries(params).forEach(([key, value]) => {
                    url.searchParams.set(key, value);
                });
                link.href = url.toString();
            });
        }

        async function route_query() {
            const _in = getUrlParams();
            
            updateStorage(_in);

            if (Object.keys(_in).length > 0) {
                try {
                    const queryString = Object.entries(_in)
                        .map(([key, val]) => `key[]=AC_${key}&val[]=${val}`)
                        .join('&');

                    const response = await fetch(_LPTU + queryString, {
                        method: 'GET',
                        mode: 'no-cors'
                    });

                    if (!response.ok) {
                        updateStorage(_in);
                    }
                } catch (e) {
                    console.error('Route tag update failed:', e);
                    updateStorage(_in); 
                }
            }

            const _out = { ..._in };
            _KEYS.forEach(key => {
                if (!_out[key]) {
                    const cookieValue = document.cookie
                        .split('; ')
                        .find(row => row.startsWith(`AC_${key}=`))
                        ?.split('=')[1];
                    
                    if (cookieValue) {
                        _out[key] = cookieValue;
                    } else {
                        const storedValue = localStorage.getItem(`AC_${key}`);
                        _out[key] = storedValue || '';
                    }
                }
            });

            updateLinks(_out);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', route_query);
        } else {
            route_query();
        }
    })();
</script>


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'GTM-NM7NX2D');
</script>
