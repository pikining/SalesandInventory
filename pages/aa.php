<!DOCTYPE html>
<html lang="en">
<head>
    <title>jQuery PH Locations</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="jQuery Plugin for displaying dropdown list of Philippines' Region, Province, City and Barangay in your webpage.">
    <meta name="author" content="Darwin Biler">    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="assets/plugins/prism/prism.css">
    <link rel="stylesheet" href="assets/plugins/elegant_font/css/style.css">  
      
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    
</head> 

<body class="body-green">
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KN9BVB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KN9BVB');</script>
<!-- End Google Tag Manager -->
    <div class="page-wrapper">
        <!-- ******Header****** -->
        <header id="header" class="header">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">
                        <a href="index.html">
                            <span aria-hidden="true" class="icon_documents_alt icon"></span>
                            <span class="text-highlight">jQuery</span><span class="text-bold">PH Locations</span>
                        </a>
                    </h1>
                    
                </div><!--//branding-->                
            </div><!--//container-->
        </header><!--//header-->
        <div class="doc-wrapper">
            <div class="container">
                <div class="doc-body row">
                    <div class="doc-content col-md-9 col-12 order-1">
                        <div class="content-inner">
                            <section id="overview-section" class="doc-section">
                                <h2 class="section-title">Overview</h2>
                                <div class="section-block">
                                    <p> 
                                        If you are developing a web application or website that requires user to provide a location (address of their house, business, establishment etc) for visitors in Philippines,
                                        It might be useful for them to select from a list of Cities or Barangay instead of typing everything in a text field.
                                    </p>

                                    <h3>The Problem</h3>
                                    <p>
                                        There is around approximately 42,000 plus barangays in the Philippines. Let alone the list of cities.
                                        Storing this amount of data just to display this kind of dropdown is too much of hassle and load for most applications.
                                        Not to mention, that you need to have the copy of this data in every database that needs this, there should be a better way of doing it...
                                        <br/>
                                    </p>

                                    <h3>The Solution</h3>
                                    <p>
                                        I've developed a jQuery Plugin that allows you to turn any <code>&lt;select&gt;&lt;/select&gt;</code> element into a dynamic one, so that its list of 
                                        <code>&lt;options&gt;&lt;/options&gt;</code> is automatically populated by data via AJAX request.

                                        <br/>The AJAX request is being initiated into a <a href="https://ph-locations-api.buonzz.com/" target="_blank">FREE REST API</a> (that I've also developed) 
                                        which is pretty much responsible for returning the list of items depending on the filter and option you specified when invoking the plugin.
                                    </p>

                                    <h3>Quick Demo</h3>
                                    <p>
                                        Here is a very simple demo of what the plugin can do. Below, you could see we have 4 dropdowns.
                                        Each is being populated dynamically by the plugin, depending on the value of the dropdown above it<br/>
                                        <img alt="demo cascading dropdown" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery-ph-locations-demo.gif"/>

                                        <a href="https://www.darwinbiler.com/jquery-ph-locations/demo/plain.html" target="_blank">See LIVE DEMO</a>
                                        <ul>
                                            <li>Region is populated upon page load</li>
                                            <li>Province is populated depending on what is selected in Region</li>
                                            <li>City is populated depending on what is selected in Province</li>
                                            <li>Barangay is populated depending on what is selected in City</li>
                                        </ul>


                                    </p>
                                    <div class="code-block" style="width: fit-content;">
                                    <pre class=" language-javascript"><code class="language-javascript">// attach handlers when user had selected an item in the dropdown   
    $(&#x27;#region&#x27;).on(&#x27;change&#x27;, function(){ // fill province dropdown });
    $(&#x27;#province&#x27;).on(&#x27;change&#x27;, function(){ // fill cities dropdown });
    $(&#x27;#city&#x27;).on(&#x27;change&#x27;, function(){ // fill barangay dropdown });
    
    // call the plugin to those dropdowns with the proper location_type
    $(&#x27;#region&#x27;).ph_locations({&#x27;location_type&#x27;: &#x27;regions&#x27;});
    $(&#x27;#province&#x27;).ph_locations({&#x27;location_type&#x27;: &#x27;provinces&#x27;});
    $(&#x27;#city&#x27;).ph_locations({&#x27;location_type&#x27;: &#x27;cities&#x27;});
    $(&#x27;#barangay&#x27;).ph_locations({&#x27;location_type&#x27;: &#x27;barangays&#x27;});
    
    // fill up the regions dropdown, so user can start &#x22;drilling down&#x22;
    $(&#x27;#region&#x27;).ph_locations(&#x27;fetch_list&#x27;);</code></pre>
                                    </div>
                                    <p>
                                    Note that this plugin doesn't requires you to install any backend script in your app.
                                    You can use it in any static website that have jQuery.

                                    Interested? head over to the <a href="#installation-section">Installation</a> to start using it!
                                    </p>
                                </div>
                            </section><!--//doc-section-->
                            <section id="installation-section" class="doc-section">
                                <h2 class="section-title">Installation</h2>
                                <div class="section-block">
                                    install it by putting this in your HTML code (head or right before footer)
                                    <div class="code-block" style="width: fit-content;">
                                        <pre class=" language-javascript"><code class="language-javascript">&#x3C;script src=&#x22;https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js&#x22;&#x3E;&#x3C;/script&#x3E;</code></pre>                               
                                    </div>
                                    or save the copy of the file above and upload the <code>jquery.ph-locations-v1.0.0.js</code> somewhere in your server and reference it.

    </div><!-- section block -->
                            </section><!--//doc-section-->
     
                            
                            <section id="usage-section" class="doc-section">
                                <h2 class="section-title">Usage</h2>
                                <div class="section-block">
                                <p>create the markup</p>
                                <div class="code-block" style="width: fit-content;">
                                    <pre class=" language-javascript">
<code class="language-javascript">&#x3C;select name=&#x22;city&#x22; id=&#x22;my-city-dropdown&#x22;&#x3E;&#x3C;/select&#x3E;</code></pre>                               
                                </div>
                               initialize the control 
                               <div class="code-block" style="width: fit-content;">
                                <pre class=" language-javascript">
<code class="language-javascript">$(&#x27;#my-city-dropdown&#x27;).ph_locations({&#x27;location_type&#x27;: &#x27;cities&#x27;});</code></pre>    
                                </div> 
                                populate the dropdown with items (and optionally pass any filter)                           
                                <div class="code-block" style="width: fit-content;">
                                    <pre class=" language-javascript">
<code class="language-javascript">$(&#x27;#my-city-dropdown&#x27;).ph_locations( &#x27;fetch_list&#x27;, [{&#x22;province_code&#x22;: &#x22;1339&#x22;}]);</code>
</pre>    
</div>
see more below about the codes assigned for each location.
<br/>
<br/>
<h5>Configuration</h5>
When initializing the plugin, you need to pass the <b>location_type</b> setting so that it knows what kind of data you are trying to display (region, province, city, barangay). The possible values are:

<ul>
    <li><b>regions</b> - this dropdown will gonna be filled with list of region</li>
    <li><b>provinces</b> - this dropdown will gonna be filled with list of province</li>
    <li><b>cities</b> - this dropdown will gonna be filled with list of cities</li>
    <li><b>barangays</b> - this dropdown will gonna be filled with list of barangay</li>
</ul>


in order to populate the dropdown with items, you need to call the <b>fetch_list</b> function by the plugin. The fetch_list function can accept <b>filters</b> that allows you to limit the number of items to show. For example, the dropdown above will list only show cities that is under Manila City, represented by province_code 1339. The 1339 value is the assigned code by  <a href="https://psa.gov.ph/classification/psgc/" target="_blank">Philippine Standard Geographic Codes (PSGC)</a>

<p>You can also check the <a href="https://github.com/buonzz/jquery-ph-locations/blob/master/docs/demo/plain.html" target="_blank">source code</a> of the  <a href="http://www.darwinbiler.com/jquery-ph-locations/demo/plain.html" target="_blank">demo</a> to see how it is used.</p>
</div><!-- section block-->
                            </section>                                

                            <section id="about-section" class="doc-section">
                                <h2 class="section-title">About</h2>
                                <div class="section-block">
                                    Why Philippines only? why not a plugin that can list every possible location on earth?
                                    <br/>
                                    That would be a very generic project that its usefulness is very minimal, as each country might have their own way of classifying smaller towns and cities.
                                    For example, "barangay" is something very specific to Philippines only. We also have our own way of classifying geographical locations as defined by 
                                    <a href="https://psa.gov.ph/classification/psgc/" target="_blank">Philippine Standard Geographic Codes (PSGC)</a> which only makes sense in Philippines usage but not outside the country.
                                </div>
                            </section>                                

                            <section id="sponsor-section" class="doc-section">
                                <h2 class="section-title">Sponsor / Donate</h2>
                                <div class="section-block">
                                        <p>
                                            You can show your support and appreciation by
                                            <a href="https://www.buymeacoffee.com/kt7vrlS6F" target="_blank">Buying me a coffee</a> (I love coffee!).
                                        </p>
                                        <h3>Contribute</h3>
                                        <p>The project is open-source and can be found in this <a href="https://github.com/buonzz/jquery-ph-locations" target="_blank">GitHub repo</a>. If you happen to find any bug or improvements that could be made to better cater to your project, feel free to <a href="https://github.com/buonzz/jquery-ph-locations/issues/new" target="_blank">open an issue</a> </p>
                                </div>
                                </section>
                            </section>                                

                            <section id="credits-section" class="doc-section">
                                <h2 class="section-title">Credits</h2>
                                <div class="section-block">
                                    <ul>
                                        <li><a href="https://github.com/clavearnel/philippines-region-province-citymun-brgy" target="_blank">clavearnel
                                            /
                                            philippines-region-province-citymun-brgy</a> for the JSON data that I've used to create the REST API</li>
                                         <li><a href="http://www.nscb.gov.ph/" target="_blank">National Statistical Coordination Board</a> for the updated version of locations</li>   

                                        </ul>
                                </div>
                            </section>                                
                        </div><!--//content-inner-->
                    </div><!--//doc-content-->
                    <div class="doc-sidebar col-md-3 col-12 order-0 d-none d-md-flex">
                        <div id="doc-nav" class="doc-nav">
	                            <nav id="doc-menu" class="nav doc-menu flex-column sticky">
	                                <a class="nav-link scrollto" href="#overview-section">Overview</a>
	                                <a class="nav-link scrollto" href="#installation-section">Installation</a>
	                                <a class="nav-link scrollto" href="#usage-section">Usage</a>
                                    <nav class="doc-sub-menu nav flex-column">
                                        <a class="nav-link scrollto" href="#plain">Plain HTML</a>
                                    </nav><!--//nav-->
	                                <a class="nav-link scrollto" href="#about-section">About</a>
                                    <a class="nav-link scrollto" href="#sponsor-section">Sponsor / Donate</a>
                                    <a class="nav-link scrollto" href="#credits-section">Credits</a>                                    
                                </nav><!--//doc-menu-->
	                        
                        </div>
                    </div><!--//doc-sidebar-->
                </div><!--//doc-body-->              
            </div><!--//container-->
        </div><!--//doc-wrapper-->        
    </div><!--//page-wrapper-->
    
    <footer id="footer" class="footer text-center">
        <div class="container">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Designed with <i class="fas fa-heart"></i> by <a href="https://themes.3rdwavemedia.com/" target="_blank">Xiaoying Riley</a> for developers</small>
            
        </div><!--//container-->
    </footer><!--//footer-->
    
     
    <!-- Main Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/prism/prism.js"></script>    
    <script type="text/javascript" src="assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script>      
    <script type="text/javascript" src="assets/plugins/stickyfill/dist/stickyfill.min.js"></script>                                                             
    <script type="text/javascript" src="assets/js/main.js"></script>
    
</body>
</html> 
