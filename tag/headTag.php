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

  gtag('config', 'GTM-PV539T65');
</script>


<script>
(function() {
  try {
    const currentHost = window.location.hostname;
    const ref = document.referrer;
    let isExternal = false;

    // リファラーが空でも保存（iOS対策・外部流入想定）
    if (!ref) {
      isExternal = true;
    } else {
      try {
        const refHost = new URL(ref).hostname;
        if (refHost !== currentHost) {
          isExternal = true;  // 外部サイトからの流入
        }
      } catch (e) {
        // 不正フォーマットの場合も外部扱い
        isExternal = true;
      }
    }

    if (isExternal) {
      const url = window.location.href;
      const ua = navigator.userAgent.toLowerCase();
      // デバイス判定（PC=1, SP=2, タブレット=3）
      let device = 1;
      if (/iphone|android.*mobile/.test(ua)) {
        device = 2;
      } else if (/ipad|android(?!.*mobile)/.test(ua)) {
        device = 3;
      }

      // OS判定（Windows=1, Mac=2, iOS=3, Android=4, Other=9）
      let os = 9;
      if (/iphone|ipad|ipod/.test(ua)) {
        os = 3; // iOS
      } else if (/android/.test(ua)) {
        os = 4; // Android
      } else if (/windows nt/.test(ua)) {
        os = 1; // Windows
      } else if (/macintosh|mac os x/.test(ua)) {
        os = 2; // Mac
      }

      const data = {
        time: Math.floor(Date.now() / 1000),
        device: device,
        os: os,
        url: url,
        ref: ref || ""
      };

      // LocalStorage に JSON文字列で保存
      localStorage.setItem("kbp2", JSON.stringify(data));
    }
  } catch (err) {
  }
})();
</script>