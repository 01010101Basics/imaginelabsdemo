




<!DOCTYPE html>
<html class="   ">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    
    <title>Dough/dough.js at master · nathansearles/Dough · GitHub</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png" />
    <meta property="fb:app_id" content="1401488693436528"/>

      <meta content="@github" name="twitter:site" /><meta content="summary" name="twitter:card" /><meta content="nathansearles/Dough" name="twitter:title" /><meta content="Dough is an easy to use cookie plugin for jQuery with powerful features. Dough can auto set your domain name with ‘.’ prefix so your cookies work with subdomains and will allow you to easily go fr" name="twitter:description" /><meta content="https://avatars2.githubusercontent.com/u/70886?s=400" name="twitter:image:src" />
<meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="https://avatars2.githubusercontent.com/u/70886?s=400" property="og:image" /><meta content="nathansearles/Dough" property="og:title" /><meta content="https://github.com/nathansearles/Dough" property="og:url" /><meta content="Dough is an easy to use cookie plugin for jQuery with powerful features. Dough can auto set your domain name with ‘.’ prefix so your cookies work with subdomains and will allow you to easily go from local to staging to product servers with out a problem." property="og:description" />

    <link rel="assets" href="https://github.global.ssl.fastly.net/">
    <link rel="conduit-xhr" href="https://ghconduit.com:25035/">
    <link rel="xhr-socket" href="/_sockets" />

    <meta name="msapplication-TileImage" content="/windows-tile.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="selected-link" value="repo_source" data-pjax-transient />
    <meta content="collector.githubapp.com" name="octolytics-host" /><meta content="collector-cdn.github.com" name="octolytics-script-host" /><meta content="github" name="octolytics-app-id" /><meta content="D11F36E2:4A35:35ED067:535AB52A" name="octolytics-dimension-request_id" />
    

    
    
    <link rel="icon" type="image/x-icon" href="https://github.global.ssl.fastly.net/favicon.ico" />

    <meta content="authenticity_token" name="csrf-param" />
<meta content="jcG2f1AUR4PlxAtyGYEE2GkSqhMQB+lZGVngV6MTmLi6cIoBOKSxCQ2omDQMGuG6kvHFw7uYdXflCRa5g2Ilbg==" name="csrf-token" />

    <link href="https://github.global.ssl.fastly.net/assets/github-0fccb0d1330ec12e83e33d762026ca69cd2b6862.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://github.global.ssl.fastly.net/assets/github2-e89308df4085f6abd3233836a0079a1a7e1abd84.css" media="all" rel="stylesheet" type="text/css" />
    


        <script crossorigin="anonymous" src="https://github.global.ssl.fastly.net/assets/frameworks-59c02aa6b9ceb85ebef012f790bf56e9ed982fd2.js" type="text/javascript"></script>
        <script async="async" crossorigin="anonymous" src="https://github.global.ssl.fastly.net/assets/github-0dce5cbbd453992693347ff7a62aa955cf152870.js" type="text/javascript"></script>
        
        
      <meta http-equiv="x-pjax-version" content="23f845bcccaa5e65deceed0e499eaea1">

        <link data-pjax-transient rel='permalink' href='/nathansearles/Dough/blob/e637af7dbd4b3ac3defa6e4724d6caf7969e0edf/dough.js'>

  <meta name="description" content="Dough is an easy to use cookie plugin for jQuery with powerful features. Dough can auto set your domain name with ‘.’ prefix so your cookies work with subdomains and will allow you to easily go from local to staging to product servers with out a problem." />

  <meta content="70886" name="octolytics-dimension-user_id" /><meta content="nathansearles" name="octolytics-dimension-user_login" /><meta content="1157777" name="octolytics-dimension-repository_id" /><meta content="nathansearles/Dough" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="1157777" name="octolytics-dimension-repository_network_root_id" /><meta content="nathansearles/Dough" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/nathansearles/Dough/commits/master.atom" rel="alternate" title="Recent Commits to Dough:master" type="application/atom+xml" />

  </head>


  <body class="logged_out  env-production windows vis-public page-blob">
    <a href="#start-of-content" tabindex="1" class="accessibility-aid js-skip-to-content">Skip to content</a>
    <div class="wrapper">
      
      
      
      


      
      <div class="header header-logged-out">
  <div class="container clearfix">

    <a class="header-logo-wordmark" href="https://github.com/">
      <span class="mega-octicon octicon-logo-github"></span>
    </a>

    <div class="header-actions">
        <a class="button primary" href="/join">Sign up</a>
      <a class="button signin" href="/login?return_to=%2Fnathansearles%2FDough%2Fblob%2Fmaster%2Fdough.js">Sign in</a>
    </div>

    <div class="command-bar js-command-bar  in-repository">

      <ul class="top-nav">
          <li class="explore"><a href="/explore">Explore</a></li>
        <li class="features"><a href="/features">Features</a></li>
          <li class="enterprise"><a href="https://enterprise.github.com/">Enterprise</a></li>
          <li class="blog"><a href="/blog">Blog</a></li>
      </ul>
        <form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">

<div class="commandbar">
  <span class="message"></span>
  <input type="text" data-hotkey="s, /" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" autocapitalize="off"
    
    
      data-repo="nathansearles/Dough"
      data-branch="master"
      data-sha="ae5df812f4bf638e8d20bdba0bb137a3c1d25f38"
  >
  <div class="display hidden"></div>
</div>

    <input type="hidden" name="nwo" value="nathansearles/Dough" />

    <div class="select-menu js-menu-container js-select-menu search-context-select-menu">
      <span class="minibutton select-menu-button js-menu-target" role="button" aria-haspopup="true">
        <span class="js-select-button">This repository</span>
      </span>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container" aria-hidden="true">
        <div class="select-menu-modal">

          <div class="select-menu-item js-navigation-item js-this-repository-navigation-item selected">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" class="js-search-this-repository" name="search_target" value="repository" checked="checked" />
            <div class="select-menu-item-text js-select-button-text">This repository</div>
          </div> <!-- /.select-menu-item -->

          <div class="select-menu-item js-navigation-item js-all-repositories-navigation-item">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" name="search_target" value="global" />
            <div class="select-menu-item-text js-select-button-text">All repositories</div>
          </div> <!-- /.select-menu-item -->

        </div>
      </div>
    </div>

  <span class="help tooltipped tooltipped-s" aria-label="Show command bar help">
    <span class="octicon octicon-question"></span>
  </span>


  <input type="hidden" name="ref" value="cmdform">

</form>
    </div>

  </div>
</div>



      <div id="start-of-content" class="accessibility-aid"></div>
          <div class="site" itemscope itemtype="http://schema.org/WebPage">
    <div id="js-flash-container">
      
    </div>
    <div class="pagehead repohead instapaper_ignore readability-menu">
      <div class="container">
        

<ul class="pagehead-actions">


  <li>
    <a href="/login?return_to=%2Fnathansearles%2FDough"
    class="minibutton with-count js-toggler-target star-button tooltipped tooltipped-n"
    aria-label="You must be signed in to star a repository" rel="nofollow">
    <span class="octicon octicon-star"></span>Star
  </a>

    <a class="social-count js-social-count" href="/nathansearles/Dough/stargazers">
      14
    </a>

  </li>

    <li>
      <a href="/login?return_to=%2Fnathansearles%2FDough"
        class="minibutton with-count js-toggler-target fork-button tooltipped tooltipped-n"
        aria-label="You must be signed in to fork a repository" rel="nofollow">
        <span class="octicon octicon-git-branch"></span>Fork
      </a>
      <a href="/nathansearles/Dough/network" class="social-count">
        3
      </a>
    </li>
</ul>

        <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public">
          <span class="repo-label"><span>public</span></span>
          <span class="mega-octicon octicon-repo"></span>
          <span class="author"><a href="/nathansearles" class="url fn" itemprop="url" rel="author"><span itemprop="title">nathansearles</span></a></span><!--
       --><span class="path-divider">/</span><!--
       --><strong><a href="/nathansearles/Dough" class="js-current-repository js-repo-home-link">Dough</a></strong>

          <span class="page-context-loader">
            <img alt="Octocat-spinner-32" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
          </span>

        </h1>
      </div><!-- /.container -->
    </div><!-- /.repohead -->

    <div class="container">
      <div class="repository-with-sidebar repo-container new-discussion-timeline js-new-discussion-timeline  ">
        <div class="repository-sidebar clearfix">
            

<div class="sunken-menu vertical-right repo-nav js-repo-nav js-repository-container-pjax js-octicon-loaders">
  <div class="sunken-menu-contents">
    <ul class="sunken-menu-group">
      <li class="tooltipped tooltipped-w" aria-label="Code">
        <a href="/nathansearles/Dough" aria-label="Code" class="selected js-selected-navigation-item sunken-menu-item" data-gotokey="c" data-pjax="true" data-selected-links="repo_source repo_downloads repo_commits repo_tags repo_branches /nathansearles/Dough">
          <span class="octicon octicon-code"></span> <span class="full-word">Code</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

        <li class="tooltipped tooltipped-w" aria-label="Issues">
          <a href="/nathansearles/Dough/issues" aria-label="Issues" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="i" data-selected-links="repo_issues /nathansearles/Dough/issues">
            <span class="octicon octicon-issue-opened"></span> <span class="full-word">Issues</span>
            <span class='counter'>0</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>        </li>

      <li class="tooltipped tooltipped-w" aria-label="Pull Requests">
        <a href="/nathansearles/Dough/pulls" aria-label="Pull Requests" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="p" data-selected-links="repo_pulls /nathansearles/Dough/pulls">
            <span class="octicon octicon-git-pull-request"></span> <span class="full-word">Pull Requests</span>
            <span class='counter'>0</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>


    </ul>
    <div class="sunken-menu-separator"></div>
    <ul class="sunken-menu-group">

      <li class="tooltipped tooltipped-w" aria-label="Pulse">
        <a href="/nathansearles/Dough/pulse" aria-label="Pulse" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="pulse /nathansearles/Dough/pulse">
          <span class="octicon octicon-pulse"></span> <span class="full-word">Pulse</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped tooltipped-w" aria-label="Graphs">
        <a href="/nathansearles/Dough/graphs" aria-label="Graphs" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_graphs repo_contributors /nathansearles/Dough/graphs">
          <span class="octicon octicon-graph"></span> <span class="full-word">Graphs</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped tooltipped-w" aria-label="Network">
        <a href="/nathansearles/Dough/network" aria-label="Network" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-selected-links="repo_network /nathansearles/Dough/network">
          <span class="octicon octicon-git-branch"></span> <span class="full-word">Network</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>
    </ul>


  </div>
</div>

              <div class="only-with-full-nav">
                

  

<div class="clone-url open"
  data-protocol-type="http"
  data-url="/users/set_protocol?protocol_selector=http&amp;protocol_type=clone">
  <h3><strong>HTTPS</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/nathansearles/Dough.git" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/nathansearles/Dough.git" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url "
  data-protocol-type="subversion"
  data-url="/users/set_protocol?protocol_selector=subversion&amp;protocol_type=clone">
  <h3><strong>Subversion</strong> checkout URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/nathansearles/Dough" readonly="readonly">

    <span aria-label="copy to clipboard" class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/nathansearles/Dough" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


<p class="clone-options">You can clone with
      <a href="#" class="js-clone-selector" data-protocol="http">HTTPS</a>
      or <a href="#" class="js-clone-selector" data-protocol="subversion">Subversion</a>.
  <span class="help tooltipped tooltipped-n" aria-label="Get help on which URL is right for you.">
    <a href="https://help.github.com/articles/which-remote-url-should-i-use">
    <span class="octicon octicon-question"></span>
    </a>
  </span>
</p>


  <a href="http://windows.github.com" class="minibutton sidebar-button" title="Save nathansearles/Dough to your computer and use it in GitHub Desktop." aria-label="Save nathansearles/Dough to your computer and use it in GitHub Desktop.">
    <span class="octicon octicon-device-desktop"></span>
    Clone in Desktop
  </a>

                <a href="/nathansearles/Dough/archive/master.zip"
                   class="minibutton sidebar-button"
                   aria-label="Download nathansearles/Dough as a zip file"
                   title="Download nathansearles/Dough as a zip file"
                   rel="nofollow">
                  <span class="octicon octicon-cloud-download"></span>
                  Download ZIP
                </a>
              </div>
        </div><!-- /.repository-sidebar -->

        <div id="js-repo-pjax-container" class="repository-content context-loader-container" data-pjax-container>
          


<!-- blob contrib key: blob_contributors:v21:4ebb1caf6f2cccfbe5689dbde2a86aa3 -->

<p title="This is a placeholder element" class="js-history-link-replace hidden"></p>

<a href="/nathansearles/Dough/find/master" data-pjax data-hotkey="t" class="js-show-file-finder" style="display:none">Show File Finder</a>

<div class="file-navigation">
  

<div class="select-menu js-menu-container js-select-menu" >
  <span class="minibutton select-menu-button js-menu-target" data-hotkey="w"
    data-master-branch="master"
    data-ref="master"
    role="button" aria-label="Switch branches or tags" tabindex="0" aria-haspopup="true">
    <span class="octicon octicon-git-branch"></span>
    <i>branch:</i>
    <span class="js-select-button">master</span>
  </span>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax aria-hidden="true">

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <span class="select-menu-title">Switch branches/tags</span>
        <span class="octicon octicon-remove-close js-menu-close"></span>
      </div> <!-- /.select-menu-header -->

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" class="js-select-menu-tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" class="js-select-menu-tab">Tags</a>
            </li>
          </ul>
        </div><!-- /.select-menu-tabs -->
      </div><!-- /.select-menu-filters -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <div class="select-menu-item js-navigation-item selected">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/nathansearles/Dough/blob/master/dough.js"
                 data-name="master"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="master">master</a>
            </div> <!-- /.select-menu-item -->
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

    </div> <!-- /.select-menu-modal -->
  </div> <!-- /.select-menu-modal-holder -->
</div> <!-- /.select-menu -->

  <div class="breadcrumb">
    <span class='repo-root js-repo-root'><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/nathansearles/Dough" data-branch="master" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">Dough</span></a></span></span><span class="separator"> / </span><strong class="final-path">dough.js</strong> <span aria-label="copy to clipboard" class="js-zeroclipboard minibutton zeroclipboard-button" data-clipboard-text="dough.js" data-copied-hint="copied!"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


  <div class="commit commit-loader file-history-tease js-deferred-content" data-url="/nathansearles/Dough/contributors/master/dough.js">
    Fetching contributors…

    <div class="participation">
      <p class="loader-loading"><img alt="Octocat-spinner-32-eaf2f5" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32-EAF2F5.gif" width="16" /></p>
      <p class="loader-error">Cannot retrieve contributors at this time</p>
    </div>
  </div>

<div class="file-box">
  <div class="file">
    <div class="meta clearfix">
      <div class="info file-name">
        <span class="icon"><b class="octicon octicon-file-text"></b></span>
        <span class="mode" title="File Mode">file</span>
        <span class="meta-divider"></span>
          <span>129 lines (116 sloc)</span>
          <span class="meta-divider"></span>
        <span>3.561 kb</span>
      </div>
      <div class="actions">
        <div class="button-group">
            <a class="minibutton tooltipped tooltipped-w"
               href="http://windows.github.com" aria-label="Open this file in GitHub for Windows">
                <span class="octicon octicon-device-desktop"></span> Open
            </a>
              <a class="minibutton disabled tooltipped tooltipped-w" href="#"
                 aria-label="You must be signed in to make or propose changes">Edit</a>
          <a href="/nathansearles/Dough/raw/master/dough.js" class="button minibutton " id="raw-url">Raw</a>
            <a href="/nathansearles/Dough/blame/master/dough.js" class="button minibutton js-update-url-with-hash">Blame</a>
          <a href="/nathansearles/Dough/commits/master/dough.js" class="button minibutton " rel="nofollow">History</a>
        </div><!-- /.button-group -->
          <a class="minibutton danger disabled empty-icon tooltipped tooltipped-w" href="#"
             aria-label="You must be signed in to make or propose changes">
          Delete
        </a>
      </div><!-- /.actions -->
    </div>
        <div class="blob-wrapper data type-javascript js-blob-data">
        <table class="file-code file-diff tab-size-8">
          <tr class="file-code-line">
            <td class="blob-line-nums">
              <span id="L1" rel="#L1">1</span>
<span id="L2" rel="#L2">2</span>
<span id="L3" rel="#L3">3</span>
<span id="L4" rel="#L4">4</span>
<span id="L5" rel="#L5">5</span>
<span id="L6" rel="#L6">6</span>
<span id="L7" rel="#L7">7</span>
<span id="L8" rel="#L8">8</span>
<span id="L9" rel="#L9">9</span>
<span id="L10" rel="#L10">10</span>
<span id="L11" rel="#L11">11</span>
<span id="L12" rel="#L12">12</span>
<span id="L13" rel="#L13">13</span>
<span id="L14" rel="#L14">14</span>
<span id="L15" rel="#L15">15</span>
<span id="L16" rel="#L16">16</span>
<span id="L17" rel="#L17">17</span>
<span id="L18" rel="#L18">18</span>
<span id="L19" rel="#L19">19</span>
<span id="L20" rel="#L20">20</span>
<span id="L21" rel="#L21">21</span>
<span id="L22" rel="#L22">22</span>
<span id="L23" rel="#L23">23</span>
<span id="L24" rel="#L24">24</span>
<span id="L25" rel="#L25">25</span>
<span id="L26" rel="#L26">26</span>
<span id="L27" rel="#L27">27</span>
<span id="L28" rel="#L28">28</span>
<span id="L29" rel="#L29">29</span>
<span id="L30" rel="#L30">30</span>
<span id="L31" rel="#L31">31</span>
<span id="L32" rel="#L32">32</span>
<span id="L33" rel="#L33">33</span>
<span id="L34" rel="#L34">34</span>
<span id="L35" rel="#L35">35</span>
<span id="L36" rel="#L36">36</span>
<span id="L37" rel="#L37">37</span>
<span id="L38" rel="#L38">38</span>
<span id="L39" rel="#L39">39</span>
<span id="L40" rel="#L40">40</span>
<span id="L41" rel="#L41">41</span>
<span id="L42" rel="#L42">42</span>
<span id="L43" rel="#L43">43</span>
<span id="L44" rel="#L44">44</span>
<span id="L45" rel="#L45">45</span>
<span id="L46" rel="#L46">46</span>
<span id="L47" rel="#L47">47</span>
<span id="L48" rel="#L48">48</span>
<span id="L49" rel="#L49">49</span>
<span id="L50" rel="#L50">50</span>
<span id="L51" rel="#L51">51</span>
<span id="L52" rel="#L52">52</span>
<span id="L53" rel="#L53">53</span>
<span id="L54" rel="#L54">54</span>
<span id="L55" rel="#L55">55</span>
<span id="L56" rel="#L56">56</span>
<span id="L57" rel="#L57">57</span>
<span id="L58" rel="#L58">58</span>
<span id="L59" rel="#L59">59</span>
<span id="L60" rel="#L60">60</span>
<span id="L61" rel="#L61">61</span>
<span id="L62" rel="#L62">62</span>
<span id="L63" rel="#L63">63</span>
<span id="L64" rel="#L64">64</span>
<span id="L65" rel="#L65">65</span>
<span id="L66" rel="#L66">66</span>
<span id="L67" rel="#L67">67</span>
<span id="L68" rel="#L68">68</span>
<span id="L69" rel="#L69">69</span>
<span id="L70" rel="#L70">70</span>
<span id="L71" rel="#L71">71</span>
<span id="L72" rel="#L72">72</span>
<span id="L73" rel="#L73">73</span>
<span id="L74" rel="#L74">74</span>
<span id="L75" rel="#L75">75</span>
<span id="L76" rel="#L76">76</span>
<span id="L77" rel="#L77">77</span>
<span id="L78" rel="#L78">78</span>
<span id="L79" rel="#L79">79</span>
<span id="L80" rel="#L80">80</span>
<span id="L81" rel="#L81">81</span>
<span id="L82" rel="#L82">82</span>
<span id="L83" rel="#L83">83</span>
<span id="L84" rel="#L84">84</span>
<span id="L85" rel="#L85">85</span>
<span id="L86" rel="#L86">86</span>
<span id="L87" rel="#L87">87</span>
<span id="L88" rel="#L88">88</span>
<span id="L89" rel="#L89">89</span>
<span id="L90" rel="#L90">90</span>
<span id="L91" rel="#L91">91</span>
<span id="L92" rel="#L92">92</span>
<span id="L93" rel="#L93">93</span>
<span id="L94" rel="#L94">94</span>
<span id="L95" rel="#L95">95</span>
<span id="L96" rel="#L96">96</span>
<span id="L97" rel="#L97">97</span>
<span id="L98" rel="#L98">98</span>
<span id="L99" rel="#L99">99</span>
<span id="L100" rel="#L100">100</span>
<span id="L101" rel="#L101">101</span>
<span id="L102" rel="#L102">102</span>
<span id="L103" rel="#L103">103</span>
<span id="L104" rel="#L104">104</span>
<span id="L105" rel="#L105">105</span>
<span id="L106" rel="#L106">106</span>
<span id="L107" rel="#L107">107</span>
<span id="L108" rel="#L108">108</span>
<span id="L109" rel="#L109">109</span>
<span id="L110" rel="#L110">110</span>
<span id="L111" rel="#L111">111</span>
<span id="L112" rel="#L112">112</span>
<span id="L113" rel="#L113">113</span>
<span id="L114" rel="#L114">114</span>
<span id="L115" rel="#L115">115</span>
<span id="L116" rel="#L116">116</span>
<span id="L117" rel="#L117">117</span>
<span id="L118" rel="#L118">118</span>
<span id="L119" rel="#L119">119</span>
<span id="L120" rel="#L120">120</span>
<span id="L121" rel="#L121">121</span>
<span id="L122" rel="#L122">122</span>
<span id="L123" rel="#L123">123</span>
<span id="L124" rel="#L124">124</span>
<span id="L125" rel="#L125">125</span>
<span id="L126" rel="#L126">126</span>
<span id="L127" rel="#L127">127</span>
<span id="L128" rel="#L128">128</span>
<span id="L129" rel="#L129">129</span>

            </td>
            <td class="blob-line-code"><div class="code-body highlight"><pre><div class='line' id='LC1'><span class="cm">/*</span></div><div class='line' id='LC2'><span class="cm">* Dough, A Cookie Plugin for jQuery</span></div><div class='line' id='LC3'><span class="cm">* By: Nathan Searles, http://nathansearles.com</span></div><div class='line' id='LC4'><span class="cm">* Example: http://nathansearles.com/plugin/dough</span></div><div class='line' id='LC5'><span class="cm">* Version: 1.3</span></div><div class='line' id='LC6'><span class="cm">* Updated: June 14th, 2011</span></div><div class='line' id='LC7'><span class="cm">*</span></div><div class='line' id='LC8'><span class="cm">* Licensed under the Apache License, Version 2.0 (the &#39;License&#39;);</span></div><div class='line' id='LC9'><span class="cm">* you may not use this file except in compliance with the License.</span></div><div class='line' id='LC10'><span class="cm">* You may obtain a copy of the License at</span></div><div class='line' id='LC11'><span class="cm">*</span></div><div class='line' id='LC12'><span class="cm">* http://www.apache.org/licenses/LICENSE-2.0</span></div><div class='line' id='LC13'><span class="cm">*</span></div><div class='line' id='LC14'><span class="cm">* Unless required by applicable law or agreed to in writing, software</span></div><div class='line' id='LC15'><span class="cm">* distributed under the License is distributed on an &#39;AS IS&#39; BASIS,</span></div><div class='line' id='LC16'><span class="cm">* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.</span></div><div class='line' id='LC17'><span class="cm">* See the License for the specific language governing permissions and</span></div><div class='line' id='LC18'><span class="cm">* limitations under the License.</span></div><div class='line' id='LC19'><span class="cm">*/</span></div><div class='line' id='LC20'><br/></div><div class='line' id='LC21'><span class="cm">/*</span></div><div class='line' id='LC22'><span class="cm">* Create cookie</span></div><div class='line' id='LC23'><span class="cm">*		$.dough(&quot;cookieName&quot;, &quot;cookieValue&quot;);</span></div><div class='line' id='LC24'><span class="cm">*</span></div><div class='line' id='LC25'><span class="cm">* Read cookie</span></div><div class='line' id='LC26'><span class="cm">*		$.dough(&quot;cookieName&quot;);</span></div><div class='line' id='LC27'><span class="cm">*</span></div><div class='line' id='LC28'><span class="cm">* Delete cookie</span></div><div class='line' id='LC29'><span class="cm">*		$.dough(&quot;cookieName&quot;, &quot;remove&quot;);</span></div><div class='line' id='LC30'><span class="cm">*	</span></div><div class='line' id='LC31'><span class="cm">*	Note: If setting the path to &quot;current&quot;, you must also define that when removing the cookie.</span></div><div class='line' id='LC32'><span class="cm">*		$.dough(&quot;cookieName&quot;, &quot;remove&quot;, { path: &quot;current&quot; });</span></div><div class='line' id='LC33'><span class="cm">*	</span></div><div class='line' id='LC34'><span class="cm">* Set full cookie</span></div><div class='line' id='LC35'><span class="cm">*		$.dough(&quot;cookieName&quot;, &quot;cookieValue&quot;, { expires: 365, path: &quot;current&quot;, domain: &quot;auto&quot;, secure: true });</span></div><div class='line' id='LC36'><span class="cm">*</span></div><div class='line' id='LC37'><span class="cm">*	Example cookie has a name of &quot;cookieName&quot;, a value of &quot;cookieValue&quot;, will expire in 1 year, have path of current page, domain will be autodetected and is set to secure for a use under https://.</span></div><div class='line' id='LC38'><span class="cm">*</span></div><div class='line' id='LC39'><span class="cm">* Definition</span></div><div class='line' id='LC40'><span class="cm">*	$.dough([name], [value], { [options] });</span></div><div class='line' id='LC41'><span class="cm">*</span></div><div class='line' id='LC42'><span class="cm">* Options Definition</span></div><div class='line' id='LC43'><span class="cm">*	expires: Days &quot;til cookie expires</span></div><div class='line' id='LC44'><span class="cm">*	path: Default is root &quot;/&quot;, set to &quot;current&quot; to use the path of current page</span></div><div class='line' id='LC45'><span class="cm">*	domain: Auto detect and set domain with subdomain prefix</span></div><div class='line' id='LC46'><span class="cm">*	secure: Set to true if you&quot;re using https://</span></div><div class='line' id='LC47'><span class="cm">*/</span></div><div class='line' id='LC48'><br/></div><div class='line' id='LC49'><span class="p">(</span><span class="kd">function</span><span class="p">(</span><span class="nx">$</span><span class="p">){</span></div><div class='line' id='LC50'>	<span class="nx">$</span><span class="p">.</span><span class="nx">dough</span> <span class="o">=</span> <span class="kd">function</span><span class="p">(</span> <span class="nx">name</span><span class="p">,</span> <span class="nx">value</span><span class="p">,</span> <span class="nx">option</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC51'>		<span class="c1">// Override options if specified</span></div><div class='line' id='LC52'>		<span class="nx">option</span> <span class="o">=</span> <span class="nx">$</span><span class="p">.</span><span class="nx">extend</span><span class="p">(</span> <span class="p">{},</span> <span class="nx">$</span><span class="p">.</span><span class="nx">dough</span><span class="p">.</span><span class="nx">option</span><span class="p">,</span> <span class="nx">option</span> <span class="p">);</span></div><div class='line' id='LC53'><br/></div><div class='line' id='LC54'>		<span class="c1">// We&quot;ll need this later on</span></div><div class='line' id='LC55'>		<span class="kd">var</span> <span class="nx">days</span> <span class="o">=</span> <span class="nx">option</span><span class="p">.</span><span class="nx">expires</span><span class="p">;</span></div><div class='line' id='LC56'><br/></div><div class='line' id='LC57'>		<span class="c1">// Get cookie value</span></div><div class='line' id='LC58'>		<span class="k">if</span> <span class="p">(</span><span class="nx">value</span> <span class="o">===</span> <span class="kc">undefined</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC59'>			<span class="kd">var</span> <span class="nx">results</span> <span class="o">=</span> <span class="nb">document</span><span class="p">.</span><span class="nx">cookie</span><span class="p">.</span><span class="nx">match</span><span class="p">(</span> <span class="nx">name</span> <span class="o">+</span> <span class="s2">&quot;=([^;]*)(;|$)&quot;</span> <span class="p">);</span></div><div class='line' id='LC60'>			<span class="k">if</span> <span class="p">(</span> <span class="nx">results</span> <span class="o">!=</span> <span class="kc">null</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC61'>				<span class="k">if</span> <span class="p">(</span> <span class="nx">results</span><span class="p">[</span><span class="mi">1</span><span class="p">][</span><span class="mi">0</span><span class="p">]</span> <span class="o">===</span> <span class="s2">&quot;{&quot;</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC62'>					<span class="c1">// Parse as JSON</span></div><div class='line' id='LC63'>					<span class="k">return</span> <span class="nx">$</span><span class="p">.</span><span class="nx">parseJSON</span><span class="p">(</span><span class="nx">results</span><span class="p">[</span><span class="mi">1</span><span class="p">]);</span></div><div class='line' id='LC64'>				<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC65'>					<span class="k">return</span> <span class="nx">results</span><span class="p">[</span><span class="mi">1</span><span class="p">];</span></div><div class='line' id='LC66'>				<span class="p">}</span></div><div class='line' id='LC67'>			<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC68'>				<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC69'>			<span class="p">}</span></div><div class='line' id='LC70'>		<span class="p">}</span></div><div class='line' id='LC71'><br/></div><div class='line' id='LC72'>		<span class="c1">// Remove cookie</span></div><div class='line' id='LC73'>		<span class="k">if</span> <span class="p">(</span><span class="nx">value</span> <span class="o">==</span> <span class="s2">&quot;remove&quot;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC74'>			<span class="nx">days</span> <span class="o">=</span> <span class="o">-</span><span class="mi">1</span><span class="p">;</span></div><div class='line' id='LC75'>			<span class="nx">value</span> <span class="o">=</span> <span class="s2">&quot;&quot;</span><span class="p">;</span></div><div class='line' id='LC76'>		<span class="p">}</span></div><div class='line' id='LC77'><br/></div><div class='line' id='LC78'>		<span class="c1">// Start the baking</span></div><div class='line' id='LC79'>		<span class="kd">var</span> <span class="nx">bake</span> <span class="o">=</span> <span class="nx">name</span> <span class="o">+</span> <span class="s2">&quot;=&quot;</span> <span class="o">+</span> <span class="nx">value</span><span class="p">;</span></div><div class='line' id='LC80'><br/></div><div class='line' id='LC81'>		<span class="c1">// Set the date</span></div><div class='line' id='LC82'>		<span class="k">if</span> <span class="p">(</span><span class="nx">days</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC83'>			<span class="kd">var</span> <span class="nx">date</span> <span class="o">=</span> <span class="k">new</span> <span class="nb">Date</span><span class="p">();</span></div><div class='line' id='LC84'>			<span class="c1">// Get current date add/remove days &quot;til expired</span></div><div class='line' id='LC85'>			<span class="nx">date</span><span class="p">.</span><span class="nx">setTime</span><span class="p">(</span><span class="nx">date</span><span class="p">.</span><span class="nx">getTime</span><span class="p">()</span><span class="o">+</span><span class="p">(</span><span class="nx">days</span><span class="o">*</span><span class="mi">24</span><span class="o">*</span><span class="mi">60</span><span class="o">*</span><span class="mi">60</span><span class="o">*</span><span class="mi">1000</span><span class="p">));</span></div><div class='line' id='LC86'>			<span class="c1">// Convert to UTC string.</span></div><div class='line' id='LC87'>			<span class="nx">bake</span> <span class="o">+=</span> <span class="s2">&quot;; expires=&quot;</span> <span class="o">+</span> <span class="nx">date</span><span class="p">.</span><span class="nx">toUTCString</span><span class="p">();</span></div><div class='line' id='LC88'>		<span class="p">}</span></div><div class='line' id='LC89'><br/></div><div class='line' id='LC90'>		<span class="c1">// Set the path</span></div><div class='line' id='LC91'>		<span class="k">if</span> <span class="p">(</span><span class="nx">option</span><span class="p">.</span><span class="nx">path</span> <span class="o">==</span> <span class="s2">&quot;current&quot;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC92'>			<span class="nx">bake</span> <span class="o">+=</span> <span class="s2">&quot;;&quot;</span><span class="p">;</span></div><div class='line' id='LC93'>		<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC94'>			<span class="nx">bake</span> <span class="o">+=</span> <span class="s2">&quot;; path=&quot;</span> <span class="o">+</span> <span class="nx">option</span><span class="p">.</span><span class="nx">path</span> <span class="o">+</span> <span class="s2">&quot;;&quot;</span><span class="p">;</span></div><div class='line' id='LC95'>		<span class="p">}</span></div><div class='line' id='LC96'><br/></div><div class='line' id='LC97'>		<span class="c1">// Set the domain</span></div><div class='line' id='LC98'>		<span class="k">if</span> <span class="p">(</span><span class="nx">option</span><span class="p">.</span><span class="nx">domain</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC99'>			<span class="k">if</span> <span class="p">(</span><span class="nx">option</span><span class="p">.</span><span class="nx">domain</span> <span class="o">==</span> <span class="s2">&quot;auto&quot;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC100'>				<span class="c1">// Get domain name or IP address. Returns 192.168.1.1 or .example.com for use with subdomains</span></div><div class='line' id='LC101'>				<span class="kd">var</span> <span class="nx">ipAddress</span> <span class="o">=</span> <span class="nb">window</span><span class="p">.</span><span class="nx">location</span><span class="p">.</span><span class="nx">hostname</span><span class="p">.</span><span class="nx">match</span><span class="p">(</span><span class="sr">/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/g</span><span class="p">),</span></div><div class='line' id='LC102'>					<span class="nx">domainName</span> <span class="o">=</span> <span class="s2">&quot;.&quot;</span> <span class="o">+</span> <span class="nb">window</span><span class="p">.</span><span class="nx">location</span><span class="p">.</span><span class="nx">hostname</span><span class="p">;</span></div><div class='line' id='LC103'>				<span class="c1">// Is locaiton an IP address or domain name?</span></div><div class='line' id='LC104'>				<span class="kd">var</span> <span class="nx">currentLocation</span> <span class="o">=</span> <span class="nx">ipAddress</span> <span class="o">?</span> <span class="nx">ipAddress</span><span class="p">.</span><span class="nx">toString</span><span class="p">()</span> <span class="o">:</span> <span class="nx">domainName</span><span class="p">.</span><span class="nx">toString</span><span class="p">();</span></div><div class='line' id='LC105'>				<span class="nx">bake</span> <span class="o">+=</span> <span class="s2">&quot;; domain=&quot;</span> <span class="o">+</span> <span class="nx">currentLocation</span> <span class="o">+</span> <span class="s2">&quot;;&quot;</span><span class="p">;</span></div><div class='line' id='LC106'>			<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC107'>				<span class="c1">// If domain specified</span></div><div class='line' id='LC108'>				<span class="nx">bake</span> <span class="o">+=</span> <span class="s2">&quot;; domain=&quot;</span> <span class="o">+</span>  <span class="nx">option</span><span class="p">.</span><span class="nx">domain</span> <span class="o">+</span> <span class="s2">&quot;;&quot;</span><span class="p">;</span></div><div class='line' id='LC109'>			<span class="p">}</span></div><div class='line' id='LC110'>		<span class="p">}</span></div><div class='line' id='LC111'><br/></div><div class='line' id='LC112'>		<span class="c1">// If secure connection required</span></div><div class='line' id='LC113'>		<span class="k">if</span> <span class="p">(</span><span class="nx">option</span><span class="p">.</span><span class="nx">secure</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC114'>			<span class="nx">bake</span> <span class="o">+=</span> <span class="s2">&quot;; secure&quot;</span><span class="p">;</span></div><div class='line' id='LC115'>		<span class="p">}</span></div><div class='line' id='LC116'><br/></div><div class='line' id='LC117'>		<span class="c1">// Cookie is baked.</span></div><div class='line' id='LC118'>		<span class="nb">document</span><span class="p">.</span><span class="nx">cookie</span> <span class="o">=</span> <span class="nx">bake</span><span class="p">;</span></div><div class='line' id='LC119'>	<span class="p">};</span></div><div class='line' id='LC120'><br/></div><div class='line' id='LC121'>	<span class="c1">// default options</span></div><div class='line' id='LC122'>	<span class="nx">$</span><span class="p">.</span><span class="nx">dough</span><span class="p">.</span><span class="nx">option</span> <span class="o">=</span> <span class="p">{</span></div><div class='line' id='LC123'>		<span class="nx">expires</span><span class="o">:</span> <span class="kc">false</span><span class="p">,</span></div><div class='line' id='LC124'>		<span class="nx">path</span><span class="o">:</span> <span class="s2">&quot;/&quot;</span><span class="p">,</span></div><div class='line' id='LC125'>		<span class="nx">domain</span><span class="o">:</span> <span class="kc">false</span><span class="p">,</span></div><div class='line' id='LC126'>		<span class="nx">secure</span><span class="o">:</span> <span class="kc">false</span></div><div class='line' id='LC127'>	<span class="p">};</span></div><div class='line' id='LC128'><br/></div><div class='line' id='LC129'><span class="p">})(</span><span class="nx">jQuery</span><span class="p">);</span></div></pre></div></td>
          </tr>
        </table>
  </div>

  </div>
</div>

<a href="#jump-to-line" rel="facebox[.linejump]" data-hotkey="l" class="js-jump-to-line" style="display:none">Jump to Line</a>
<div id="jump-to-line" style="display:none">
  <form accept-charset="UTF-8" class="js-jump-to-line-form">
    <input class="linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" autofocus>
    <button type="submit" class="button">Go</button>
  </form>
</div>

        </div>

      </div><!-- /.repo-container -->
      <div class="modal-backdrop"></div>
    </div><!-- /.container -->
  </div><!-- /.site -->


    </div><!-- /.wrapper -->

      <div class="container">
  <div class="site-footer">
    <ul class="site-footer-links right">
      <li><a href="https://status.github.com/">Status</a></li>
      <li><a href="http://developer.github.com">API</a></li>
      <li><a href="http://training.github.com">Training</a></li>
      <li><a href="http://shop.github.com">Shop</a></li>
      <li><a href="/blog">Blog</a></li>
      <li><a href="/about">About</a></li>

    </ul>

    <a href="/">
      <span class="mega-octicon octicon-mark-github" title="GitHub"></span>
    </a>

    <ul class="site-footer-links">
      <li>&copy; 2014 <span title="0.03258s from github-fe125-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="/site/terms">Terms</a></li>
        <li><a href="/site/privacy">Privacy</a></li>
        <li><a href="/security">Security</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
  </div><!-- /.site-footer -->
</div><!-- /.container -->


    <div class="fullscreen-overlay js-fullscreen-overlay" id="fullscreen_overlay">
  <div class="fullscreen-container js-fullscreen-container">
    <div class="textarea-wrap">
      <textarea name="fullscreen-contents" id="fullscreen-contents" class="fullscreen-contents js-fullscreen-contents" placeholder="" data-suggester="fullscreen_suggester"></textarea>
    </div>
  </div>
  <div class="fullscreen-sidebar">
    <a href="#" class="exit-fullscreen js-exit-fullscreen tooltipped tooltipped-w" aria-label="Exit Zen Mode">
      <span class="mega-octicon octicon-screen-normal"></span>
    </a>
    <a href="#" class="theme-switcher js-theme-switcher tooltipped tooltipped-w"
      aria-label="Switch themes">
      <span class="octicon octicon-color-mode"></span>
    </a>
  </div>
</div>



    <div id="ajax-error-message" class="flash flash-error">
      <span class="octicon octicon-alert"></span>
      <a href="#" class="octicon octicon-remove-close close js-ajax-error-dismiss"></a>
      Something went wrong with that request. Please try again.
    </div>

  </body>
</html>

