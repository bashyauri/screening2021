<style>
    /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */

    /* Document
   ========================================================================== */

    /**
 * 1. Correct the line height in all browsers.
 * 2. Prevent adjustments of font size after orientation changes in iOS.
 */

    html {
        line-height: 1.15;
        /* 1 */
        -webkit-text-size-adjust: 100%;
        /* 2 */
    }

    /* Sections
   ========================================================================== */

    /**
 * Remove the margin in all browsers.
 */

    body {
        margin: 0;
    }

    /**
 * Render the `main` element consistently in IE.
 */

    main {
        display: block;
    }

    /**
 * Correct the font size and margin on `h1` elements within `section` and
 * `article` contexts in Chrome, Firefox, and Safari.
 */

    h1 {
        font-size: 1.5em;
        margin: 0.67em 0;
    }

    /* Grouping content
   ========================================================================== */

    /**
 * 1. Add the correct box sizing in Firefox.
 * 2. Show the overflow in Edge and IE.
 */

    hr {
        box-sizing: content-box;
        /* 1 */
        height: 0;
        /* 1 */
        overflow: visible;
        /* 2 */
    }

    /**
 * 1. Correct the inheritance and scaling of font size in all browsers.
 * 2. Correct the odd `em` font sizing in all browsers.
 */

    pre {
        font-family: monospace, monospace;
        /* 1 */
        font-size: 1em;
        /* 2 */
    }

    /* Text-level semantics
   ========================================================================== */

    /**
 * Remove the gray background on active links in IE 10.
 */

    a {
        background-color: transparent;
    }

    /**
 * 1. Remove the bottom border in Chrome 57-
 * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
 */

    abbr[title] {
        border-bottom: none;
        /* 1 */
        text-decoration: underline;
        /* 2 */
        text-decoration: underline dotted;
        /* 2 */
    }

    /**
 * Add the correct font weight in Chrome, Edge, and Safari.
 */

    b,
    strong {
        font-weight: bolder;
    }

    /**
 * 1. Correct the inheritance and scaling of font size in all browsers.
 * 2. Correct the odd `em` font sizing in all browsers.
 */

    code,
    kbd,
    samp {
        font-family: monospace, monospace;
        /* 1 */
        font-size: 1em;
        /* 2 */
    }

    /**
 * Add the correct font size in all browsers.
 */

    small {
        font-size: 80%;
    }

    /**
 * Prevent `sub` and `sup` elements from affecting the line height in
 * all browsers.
 */

    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline;
    }

    sub {
        bottom: -0.25em;
    }

    sup {
        top: -0.5em;
    }

    /* Embedded content
   ========================================================================== */

    /**
 * Remove the border on images inside links in IE 10.
 */

    img {
        border-style: none;
    }

    /* Forms
   ========================================================================== */

    /**
 * 1. Change the font styles in all browsers.
 * 2. Remove the margin in Firefox and Safari.
 */

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        /* 1 */
        font-size: 100%;
        /* 1 */
        line-height: 1.15;
        /* 1 */
        margin: 0;
        /* 2 */
    }

    /**
 * Show the overflow in IE.
 * 1. Show the overflow in Edge.
 */

    button,
    input {
        /* 1 */
        overflow: visible;
    }

    /**
 * Remove the inheritance of text transform in Edge, Firefox, and IE.
 * 1. Remove the inheritance of text transform in Firefox.
 */

    button,
    select {
        /* 1 */
        text-transform: none;
    }

    /**
 * Correct the inability to style clickable types in iOS and Safari.
 */

    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
        -webkit-appearance: button;
    }

    /**
 * Remove the inner border and padding in Firefox.
 */

    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
        border-style: none;
        padding: 0;
    }

    /**
 * Restore the focus styles unset by the previous rule.
 */

    button:-moz-focusring,
    [type="button"]:-moz-focusring,
    [type="reset"]:-moz-focusring,
    [type="submit"]:-moz-focusring {
        outline: 1px dotted ButtonText;
    }

    /**
 * Correct the padding in Firefox.
 */

    fieldset {
        padding: 0.35em 0.75em 0.625em;
    }

    /**
 * 1. Correct the text wrapping in Edge and IE.
 * 2. Correct the color inheritance from `fieldset` elements in IE.
 * 3. Remove the padding so developers are not caught out when they zero out
 *    `fieldset` elements in all browsers.
 */

    legend {
        box-sizing: border-box;
        /* 1 */
        color: inherit;
        /* 2 */
        display: table;
        /* 1 */
        max-width: 100%;
        /* 1 */
        padding: 0;
        /* 3 */
        white-space: normal;
        /* 1 */
    }

    /**
 * Add the correct vertical alignment in Chrome, Firefox, and Opera.
 */

    progress {
        vertical-align: baseline;
    }

    /**
 * Remove the default vertical scrollbar in IE 10+.
 */

    textarea {
        overflow: auto;
    }

    /**
 * 1. Add the correct box sizing in IE 10.
 * 2. Remove the padding in IE 10.
 */

    [type="checkbox"],
    [type="radio"] {
        box-sizing: border-box;
        /* 1 */
        padding: 0;
        /* 2 */
    }

    /**
 * Correct the cursor style of increment and decrement buttons in Chrome.
 */

    [type="number"]::-webkit-inner-spin-button,
    [type="number"]::-webkit-outer-spin-button {
        height: auto;
    }

    /**
 * 1. Correct the odd appearance in Chrome and Safari.
 * 2. Correct the outline style in Safari.
 */

    [type="search"] {
        -webkit-appearance: textfield;
        /* 1 */
        outline-offset: -2px;
        /* 2 */
    }

    /**
 * Remove the inner padding in Chrome and Safari on macOS.
 */

    [type="search"]::-webkit-search-decoration {
        -webkit-appearance: none;
    }

    /**
 * 1. Correct the inability to style clickable types in iOS and Safari.
 * 2. Change font properties to `inherit` in Safari.
 */

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        /* 1 */
        font: inherit;
        /* 2 */
    }

    /* Interactive
   ========================================================================== */

    /*
 * Add the correct display in Edge, IE 10+, and Firefox.
 */

    details {
        display: block;
    }

    /*
 * Add the correct display in all browsers.
 */

    summary {
        display: list-item;
    }

    /* Misc
   ========================================================================== */

    /**
 * Add the correct display in IE 10+.
 */

    template {
        display: none;
    }

    /**
 * Add the correct display in IE 10.
 */

    [hidden] {
        display: none;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
            "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif,
            "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    header h4 {
        text-align: center;
    }

    article {
        width: 85%;
        margin: 10px auto;
        line-height: 1.5rem;
    }

    article span {
        font-weight: bold;
    }

    ol ol {
        line-height: 1.5rem;
    }

    footer {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }


    .offer {
        width: 100%;
        margin: 40px auto;
    }

    .logo-div {
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        text-align: center;
    }

    .logo-div h2 {
        color: #116530;
    }

    .logo-img {
        /* margin-right: 5rem; */
        margin-left: 5rem;
    }

    .address-div {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 85%;
        margin: 10px auto;
    }

    .date-div {
        height: 100%;
    }

    .date-div p:first-child {
        margin-bottom: 5rem;
    }

    .inner-list {
        list-style-type: lower-alpha;
    }

    .stamp-div {
        display: flex;
        flex-direction: column;
        /* align-content: space-between; */
        justify-content: center;
        text-align: center;
    }

    .stamp-div div {
        border: 3px solid black;
        height: 60px;
        width: 17rem;
    }

    .sign-div {
        display: flex;
        flex-direction: column;
        /* align-content: space-between; */
        justify-content: center;
        text-align: center;
    }

    .sign-div div {
        border: 1px solid black;
        height: 1px;
        width: 17rem;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="normalize.css">

    <title>provisional offer</title>
</head>

<body>
    <div class="offer">
        <div class="logo-div">
            <div class="logo-img"><img src="{{ asset('assets/img/logos/logo.jpg') }}" alt="logo-image" height="100px" />
            </div>
            <div class="logo-text">
                <h2 class="">WAZIRI UMARU FEDERAL POLYTECHNIC</h2>
                <h3>OFFICE OF THE REGISTRAR</h3>
                <h3>(ACADEMIC AFFAIRS DIVISION)</h3>
                <h3>BIRNIN KEBBI</h3>
            </div>
            <div class="logo-img"> {!! QrCode::size(100)->generate($fullName . ' Remita:' . $rrr) !!}</div>
        </div>
        <div class="address-div">
            <div class="to-div">

                <p>To: <strong>.......{{ strtoupper($fullName) }}.....</strong></p>

            </div>
            <div class="date-div">
                <p>Date:<strong>.......{{ date('d/m/Y') }}.....</strong></p>

            </div>
        </div>
        <section>
            <header>
                <h4>PROVISIONAL OFFER OF ADMISSION {{ date('Y') - 1 }}/{{ date('Y') }} ACADEMIC SESSION</h4>
            </header>
            <article>
                <p>This is to inform you that you have being offered provisional offer admission into the</p>
                <p>Waziri Umaru Federal Polytechnic Birnin Kebbi, Kebbi State to pursue the following:-</p>
                <p><span>Course:</span> {{ $course }}
                </p>
                <p><span>Department: </span>{{ $department }}
                </p>

                <p><span>Duration:</span> {{ auth()->user()->programme_id == 1 ? 2 : 3 }}
                    years
                </p>
                <ol>
                    <li>
                        Please note that the confirmation of this offer is subject to the following conditions
                        <ol class="inner-list">
                            <li>Provision of the minimum entry requiremnet prescribed for the course.</li>
                            <li>Presentation during registration of the original(s) or the certificate(s) or any other
                                evidence
                                of the qualification on which the offer has been based.
                            </li>
                            <li>Evidence from a recognized medical practitioner certifying that the candidate is
                                physically and mentally fit to undergo the prescribed course of study</li>
                        </ol>
                    </li>
                    <li>If before, during or after registration you are found not having the minimum entry requirement
                        prescribed for your course of study or that the qualifications
                        you purport to possess are false or incorrect, you will be dismissed and in addition you may be
                        liable to prosecution.</li>
                    <li>Except on expectation circumstance, no change of course will be entertained from any student
                        after registration</li>
                    <li>In the absence of any response from you on or before
                        ................................................ it will be assumed that the offer of admission
                        has been rejected by you.</li>
                    <li><span>All prospective students will be required to produce evidence of having paid all fees.
                            (Schedule of fees attached). REFUND OF FEES PAID WILL NOT BE ENTERTAINED PLEASE!</span></li>
                    <li><span>Please note that the polytechnic will not be responsible for your feeding and
                            accommodation.</span></li>
                    <li>Students admitted into the polytechnic are expected to promote the best interest of the
                        institution and abide by its rules and regulations.</li>
                </ol>
                <p><span>Please accept our congratulations.</span></p>
                <footer>
                    <div class="stamp-div">
                        <div><img src="{{ asset('assets/img/logos/stamped.png') }}" alt="stamped-image"
                                height="50px" />
                        </div>
                        <p>Official Stamp</p>
                    </div>
                    <div class="sign-div">
                        <img src="{{ asset('assets/img/logos/acad_sign.png') }}" alt="stamped-image" height="50px" />
                        <div></div>
                        <p>For Registrar</p>
                    </div>
                </footer>
            </article>
        </section>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
</body>
<script>
    window.print();
</script>

</html>
