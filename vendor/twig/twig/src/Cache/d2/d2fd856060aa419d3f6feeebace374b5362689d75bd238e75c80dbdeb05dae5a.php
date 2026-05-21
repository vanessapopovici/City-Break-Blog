<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* index.tpl.html */
class __TwigTemplate_6025ca7c4b4c948710daf60b385916a3abbce258934107edf190e711cbd311c0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<?php session_start();
 //\$_SESSION['user']='Admin';
 //\$_SESSION['user_image']='user_image.jpg';
?>

<!DOCTYPE html>
<html lang=\"en\">
<head>
  <title>";
        // line 9
        echo twig_escape_filter($this->env, (($context["page"] ?? null) - ($context["title"] ?? null)), "html", null, true);
        echo "</title>
  ";
        // line 10
        echo twig_include($this->env, $context, "bootstrap.tpl.html");
        echo "
  <link rel=\"stylesheet\" href=\"CSS\\styles.css\">
</head>
<body>

<div class=\"jumbotron text-center\" style=\"margin-bottom:0\">
  <h1>My First Bootstrap 4 & TWIG 3 & PHP 7.4 Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>

<div id=\"demo\" class=\"carousel slide\" data-ride=\"carousel\">

  <!-- Indicators -->
  <ul class=\"carousel-indicators\">
    <li data-target=\"#demo\" data-slide-to=\"0\" class=\"active\"></li>
    <li data-target=\"#demo\" data-slide-to=\"1\"></li>
    <li data-target=\"#demo\" data-slide-to=\"2\"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class=\"carousel-inner\">
    <div class=\"carousel-item active\">
      <img src=\"la.jpg\" alt=\"Los Angeles\" width=\"1100\" height=\"500\">
    </div>
    <div class=\"carousel-item\">
      <img src=\"chicago.jpg\" alt=\"Chicago\" width=\"1100\" height=\"500\">
    </div>
    <div class=\"carousel-item\">
      <img src=\"ny.jpg\" alt=\"New York\" width=\"1100\" height=\"500\">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class=\"carousel-control-prev\" href=\"#demo\" data-slide=\"prev\">
    <span class=\"carousel-control-prev-icon\"></span>
  </a>
  <a class=\"carousel-control-next\" href=\"#demo\" data-slide=\"next\">
    <span class=\"carousel-control-next-icon\"></span>
  </a>
</div>

<nav class=\"navbar navbar-expand-md navbar-dark bg-dark\">
    <a href=\"#\" class=\"navbar-brand\">Brand</a>
    <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>
    <div id=\"navbarCollapse\" class=\"collapse navbar-collapse\">
        <ul class=\"nav navbar-nav\">
            <li class=\"nav-item\">
                <a href=\"#\" class=\"nav-link\">Home</a>
            </li>
            <li class=\"nav-item\">
                <a href=\"#\" class=\"nav-link\">Profile</a>
            </li>
            <li class=\"nav-item dropdown\">
                <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Messages</a>
                <div class=\"dropdown-menu\">
                    <a href=\"#\" class=\"dropdown-item\">Inbox</a>
                    <a href=\"#\" class=\"dropdown-item\">Drafts</a>
                    <a href=\"#\" class=\"dropdown-item\">Sent Items</a>
                    <div class=\"dropdown-divider\"></div>
                    <a href=\"#\"class=\"dropdown-item\">Trash</a>
                </div>
            </li>
        </ul>
        <ul class=\"nav navbar-nav ml-auto\">
            <li class=\"nav-item dropdown\">
                <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t<?php 
\t\t\t\t\techo isset(\$_SESSION['user'])? \$_SESSION['user'] : 'User';
\t\t\t\t?>
\t\t\t\t</a>
                <div class=\"dropdown-menu dropdown-menu-right\">
                    <a href=\"#\" class=\"dropdown-item\">Reports</a>
                    <a href=\"<?php echo isset(\$_SESSION['user']) ? 'settings.php' : 'signin.php'; ?>\" class=\"dropdown-item\">
\t\t\t\t\t\t<?php
\t\t\t\t\t\t\techo isset(\$_SESSION['user']) ? 'Settings' : 'Sign in';\t\t
\t\t\t\t\t\t?>
\t\t\t\t\t</a>
                    <div class=\"dropdown-divider\"></div>
                    <a href=\"#\"class=\"dropdown-item\">
\t\t\t\t\t\t<?php 
\t\t\t\t\t\t\techo isset(\$_SESSION['user'])? 'Logout' : 'Login';
\t\t\t\t\t\t?>
\t\t\t\t\t</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class=\"container\" style=\"margin-top:30px\">
  <div class=\"row\">
    <div class=\"col-sm-4\">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <div class=\"fakeimg\"><img src=\"<?php echo \$_SESSION['user_image']; ?>\"></img></div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
      <h3>Some Links</h3>
      <p>Lorem ipsum dolor sit ame.</p>
      <ul class=\"nav nav-pills flex-column\">
        <li class=\"nav-item\">
          <a class=\"nav-link active\" href=\"#\">Active</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"#\">Link</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"#\">Link</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link disabled\" href=\"#\">Disabled</a>
        </li>
      </ul>
      <hr class=\"d-sm-none\">
    </div>
\t
\t<?php \$galerii = array(
\t\tarray(\"Title\" => \"Gallery1\", \"Title_description\" => \"Gallery1 title description\", \"gallery_iamge\" => \"la.jpg\" , \"detailed_descrition\" => \"1 Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.\"),
\t\tarray(\"Title\" => \"Gallery2\", \"Title_description\" => \"Gallery2 title description\", \"gallery_iamge\" => \"chicago.jpg\" , \"detailed_descrition\" => \"2 Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.\"),
\t\tarray(\"Title\" => \"Gallery3\", \"Title_description\" => \"Gallery3 title description\", \"gallery_iamge\" => \"ny.jpg\" , \"detailed_descrition\" => \"3 Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.\")
\t);
\t?>
\t<div class=\"col-sm-8\">
\t\t<?php
\t\t\t\$content=\"\";
\t\t\tforeach (\$galerii as \$key => \$value){
\t\t\t\t\$content.=\"<h2>\".\$value[\"Title\"].\"</h2>\";
\t\t\t\t\$content.=\"<h5>\".\$value[\"Title_description\"].\"</h5>\";
\t\t\t\t\$content.=\"<div class=\\\"fakeimg\\\"><img src=\\\"\".\$value[\"gallery_iamge\"].\"\\\"></img></div>\";
\t\t\t\t\$content.=\"<p>\".\$value[\"detailed_descrition\"].\"</p><br>\";
\t\t\t}
\t\t\techo \$content;
\t\t?>
\t</div>
  </div>
</div>

<div class=\"jumbotron text-center\" style=\"margin-bottom:0\">
  <p>Footer</p>
</div>
<?php session_destroy(); ?>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.tpl.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 10,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.tpl.html", "C:\\xampp74\\htdocs\\laborator8-bt\\templates\\index.tpl.html");
    }
}
