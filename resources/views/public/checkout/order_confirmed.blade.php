@include('partials.__header')

    <body class="bg-background-100 min-h-screen">

        <x-navConfirmed/>
        <div class="bg-background-100 flex mt-20 justify-center">
            <div class="bg-background-50 p-8 rounded-lg shadow-lg text-center">
                <h1 class="text-xl font-semibold text-gray-800 mb-4">Thank You for Your Order!</h1>
                <p class="text-base text-gray-700 mb-8">Your order has been successfully placed. We are preparing it for shipment, and you can expect delivery within 2 to 5 business days.</p>
                <p class="text-sm text-gray-500">If you have any questions about your order, please contact our customer service team.</p>

                <div class="flex flex-row justify-center items-center space-x-4 mb-4 mt-5">
                    <a href="https://www.facebook.com" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                            <path fill="#3F51B5" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"></path><path fill="#FFF" d="M34.368,25H31v13h-5V25h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H35v4h-2.287C31.104,17,31,17.6,31,18.723V21h4L34.368,25z"></path>
                        </svg>
                    </a>
                    <a href="https://www.tiktok.com" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
                            <path d="M41,4H9C6.243,4,4,6.243,4,9v32c0,2.757,2.243,5,5,5h32c2.757,0,5-2.243,5-5V9C46,6.243,43.757,4,41,4z M37.006,22.323 c-0.227,0.021-0.457,0.035-0.69,0.035c-2.623,0-4.928-1.349-6.269-3.388c0,5.349,0,11.435,0,11.537c0,4.709-3.818,8.527-8.527,8.527 s-8.527-3.818-8.527-8.527s3.818-8.527,8.527-8.527c0.178,0,0.352,0.016,0.527,0.027v4.202c-0.175-0.021-0.347-0.053-0.527-0.053 c-2.404,0-4.352,1.948-4.352,4.352s1.948,4.352,4.352,4.352s4.527-1.894,4.527-4.298c0-0.095,0.042-19.594,0.042-19.594h4.016 c0.378,3.591,3.277,6.425,6.901,6.685V22.323z"></path>
                        </svg>
                    </a>
                    <a href="mailto:support@example.com" class="text-gray-500 hover:text-gray-700">
                        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg class="w-10 h-10" height="512px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x31_12-gmail_x2C__email_x2C__mail"><g><g><g><rect height="358.87" style="fill:#F1F5F7;" width="357.904" x="77.045" y="76.565"/><path d="M256.002,293.738l178.947,141.697v-279.74L256.002,293.738z M256.002,293.738" style="fill:#DCE6EA;"/><path d="M449.861,76.565h-14.912L256.002,218.26L77.045,76.565H62.134      c-24.693,0-44.737,20.094-44.737,44.858v269.152c0,24.759,20.044,44.859,44.737,44.859h14.911v-279.74l178.957,138.014      l178.947-138.047v279.773h14.912c24.699,0,44.742-20.101,44.742-44.859V121.424C494.604,96.66,474.561,76.565,449.861,76.565      L449.861,76.565z M449.861,76.565" style="fill:#F84437;"/></g></g></g></g><g id="Layer_1"/></svg>
                    </a>
                    <a href="https://www.instagram.com" class="text-gray-500 hover:text-gray-700">
                        <?xml version="1.0" ?><svg class="w-10 h-10" id="Apple" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><style>.cls-1{fill:url(#Nepojmenovaný_přechod_27);}.cls-2{fill:#fff;}</style><linearGradient gradientUnits="userSpaceOnUse" id="Nepojmenovaný_přechod_27" x1="328.27" x2="183.73" y1="508.05" y2="3.95"><stop offset="0" stop-color="#ffdb73"/><stop offset="0.08" stop-color="#fdad4e"/><stop offset="0.15" stop-color="#fb832e"/><stop offset="0.19" stop-color="#fa7321"/><stop offset="0.23" stop-color="#f6692f"/><stop offset="0.37" stop-color="#e84a5a"/><stop offset="0.48" stop-color="#e03675"/><stop offset="0.55" stop-color="#dd2f7f"/><stop offset="0.68" stop-color="#b43d97"/><stop offset="0.97" stop-color="#4d60d4"/><stop offset="1" stop-color="#4264db"/></linearGradient></defs><title/><rect class="cls-1" height="465.06" rx="107.23" ry="107.23" width="465.06" x="23.47" y="23.47"/><path class="cls-2" d="M331,115.22a66.92,66.92,0,0,1,66.65,66.65V330.13A66.92,66.92,0,0,1,331,396.78H181a66.92,66.92,0,0,1-66.65-66.65V181.87A66.92,66.92,0,0,1,181,115.22H331m0-31H181c-53.71,0-97.66,44-97.66,97.66V330.13c0,53.71,44,97.66,97.66,97.66H331c53.71,0,97.66-44,97.66-97.66V181.87c0-53.71-43.95-97.66-97.66-97.66Z"/><path class="cls-2" d="M256,198.13A57.87,57.87,0,1,1,198.13,256,57.94,57.94,0,0,1,256,198.13m0-31A88.87,88.87,0,1,0,344.87,256,88.87,88.87,0,0,0,256,167.13Z"/><circle class="cls-2" cx="346.81" cy="163.23" r="21.07"/></svg>                    <a href="https://www.twitter.com" class="text-gray-500 hover:text-gray-700">
                            <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.0//EN'  'http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd'><svg class="w-10 h-10" enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.0" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M32,30c0,1.104-0.896,2-2,2H2c-1.104,0-2-0.896-2-2V2c0-1.104,0.896-2,2-2h28c1.104,0,2,0.896,2,2V30z" fill="#55ACEE"/><path d="M25.987,9.894c-0.736,0.322-1.525,0.537-2.357,0.635c0.85-0.498,1.5-1.289,1.806-2.231   c-0.792,0.461-1.67,0.797-2.605,0.978C22.083,8.491,21.017,8,19.838,8c-2.266,0-4.1,1.807-4.1,4.038   c0,0.314,0.036,0.625,0.104,0.922c-3.407-0.172-6.429-1.779-8.452-4.221c-0.352,0.597-0.556,1.29-0.556,2.032   c0,1.399,0.726,2.635,1.824,3.36c-0.671-0.022-1.304-0.203-1.856-0.506c-0.001,0.017-0.001,0.034-0.001,0.052   c0,1.955,1.414,3.589,3.29,3.96c-0.343,0.09-0.705,0.142-1.081,0.142c-0.264,0-0.52-0.024-0.77-0.072   c0.52,1.604,2.034,2.771,3.828,2.805C10.67,21.594,8.9,22.24,6.979,22.24c-0.33,0-0.658-0.018-0.979-0.056   c1.814,1.145,3.971,1.813,6.287,1.813c7.541,0,11.666-6.154,11.666-11.491c0-0.173-0.005-0.35-0.012-0.521   C24.741,11.414,25.438,10.703,25.987,9.894z" fill="#FFFFFF"/></g><g/><g/><g/><g/><g/><g/></svg>
                    </a>
                </div>
                <div>
                    <a href="/browse-books" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Browse Books
                    </a>
                </div>
            </div>
            
        </div>
        
    </body>
@include('partials.__footer')