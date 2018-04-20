<?php

/* home/index.html.twig */
class __TwigTemplate_963c67a203b05fb80f6077d3dbf24088549b447802bcfd64d788c2ca51c98b94 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'section1' => array($this, 'block_section1'),
            'section2' => array($this, 'block_section2'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "    <link href=\"https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700\" rel=\"stylesheet\" type=\"text/css\">
    ";
        // line 5
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 8
    public function block_header($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 9
        echo "    <header>
        <img class=\"logoImage\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-image.png"), "html", null, true);
        echo "\" alt=\"Nagido logo\"/>
        <img class=\"logoWord\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-text.png"), "html", null, true);
        echo "\" alt=\"Nagido\"/>
    </header>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 15
        echo "    ";
        $this->displayBlock('section1', $context, $blocks);
        // line 31
        echo "
    ";
        // line 32
        $this->displayBlock('section2', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 15
    public function block_section1($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "section1"));

        // line 16
        echo "        <div class=\"pageTitle\">
            <h1>Namų dokumentų gidas</h1>

            <p class=\"pageText\">
                Elektroninių ir suskaitmenintų popierinių dokumentų saugojimas vienoje vietoje: sutarčių, pažymų, kvitų, instrukcijų, garantijų ir kt. dokumentų.
            </p>

            <p class=\"googleLogin\">
                <button id=\"sigIn\" class=\"loginButton\">
                    <img class=\"googleLogo\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/google-icon.png"), "html", null, true);
        echo "\" alt=\"Google logo\"/>
                    <span>Prisijungti su Google</span>
                </button>
            </p>
        </div>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 32
    public function block_section2($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "section2"));

        // line 33
        echo "        <div class=\"pageSubTitle\">
            <h1>Sprendimai</h1>
        </div>

        <div class=\"cardGrid\">
            <div class=\"card\">
                <img src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/safety.png"), "html", null, true);
        echo "\" alt=\"Saugojimas\"/>
                <h2>Saugojimas</h2>
                <div>Prisijunkite su Google paskyra ir dokumentus saugokite savo Google diske.</div>
            </div>
            <div class=\"card\">
                <img src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/upload.png"), "html", null, true);
        echo "\" alt=\"Įkėlimas\"/>
                <h2>Įkėlimas</h2>
                <div>Kurkite naujus įrašus, įkelkite PDF ar JPG formato dokumentus.</div>
            </div>
            <div class=\"card\">
                <img src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/calendar.png"), "html", null, true);
        echo "\" alt=\"Kalendorius\"/>
                <h2>Priminimai</h2>
                <div>Gaukite pranešimus apie dokumentų galiojimo pabaigą.</div>
            </div>
            <div class=\"card\">
                <img src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/edit.png"), "html", null, true);
        echo "\" alt=\"Redagavimas\"/>
                <h2>Redagavimas</h2>
                <div>Redaguokite dokumentų informaciją: pavadinimą, pastabas, priminimo datą, kategorijas ir etiketes.</div>
            </div>
            <div class=\"card\">
                <img src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/search.png"), "html", null, true);
        echo "\" alt=\"Paieška\"/>
                <h2>Paieška</h2>
                <div>Suraskite reikiamus dokumentus pagal pavadinimą, įkėlimo ir priminimo datas, kategorijas, etiketes.</div>
            </div>
            <div class=\"card\">
                <img src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/download.png"), "html", null, true);
        echo "\" alt=\"Atsisiuntimas\"/>
                <h2>Atsisiuntimas</h2>
                <div>Atsisiųskite dokumentus į telefoną, planšetę ar kompiuterį.</div>
            </div>
        </div>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 64,  178 => 59,  170 => 54,  162 => 49,  154 => 44,  146 => 39,  138 => 33,  132 => 32,  119 => 25,  108 => 16,  102 => 15,  95 => 32,  92 => 31,  89 => 15,  83 => 14,  73 => 11,  69 => 10,  66 => 9,  60 => 8,  51 => 5,  48 => 4,  42 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block stylesheets %}
    <link href=\"https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700\" rel=\"stylesheet\" type=\"text/css\">
    {{ parent() }}
{% endblock %}

{% block header %}
    <header>
        <img class=\"logoImage\" src=\"{{ asset('images/logo-image.png') }}\" alt=\"Nagido logo\"/>
        <img class=\"logoWord\" src=\"{{ asset('images/logo-text.png') }}\" alt=\"Nagido\"/>
    </header>
{% endblock %}
{% block content %}
    {% block section1 %}
        <div class=\"pageTitle\">
            <h1>Namų dokumentų gidas</h1>

            <p class=\"pageText\">
                Elektroninių ir suskaitmenintų popierinių dokumentų saugojimas vienoje vietoje: sutarčių, pažymų, kvitų, instrukcijų, garantijų ir kt. dokumentų.
            </p>

            <p class=\"googleLogin\">
                <button id=\"sigIn\" class=\"loginButton\">
                    <img class=\"googleLogo\" src=\"{{ asset('images/google-icon.png') }}\" alt=\"Google logo\"/>
                    <span>Prisijungti su Google</span>
                </button>
            </p>
        </div>
    {% endblock %}

    {% block section2 %}
        <div class=\"pageSubTitle\">
            <h1>Sprendimai</h1>
        </div>

        <div class=\"cardGrid\">
            <div class=\"card\">
                <img src=\"{{ asset('images/safety.png') }}\" alt=\"Saugojimas\"/>
                <h2>Saugojimas</h2>
                <div>Prisijunkite su Google paskyra ir dokumentus saugokite savo Google diske.</div>
            </div>
            <div class=\"card\">
                <img src=\"{{ asset('images/upload.png') }}\" alt=\"Įkėlimas\"/>
                <h2>Įkėlimas</h2>
                <div>Kurkite naujus įrašus, įkelkite PDF ar JPG formato dokumentus.</div>
            </div>
            <div class=\"card\">
                <img src=\"{{ asset('images/calendar.png') }}\" alt=\"Kalendorius\"/>
                <h2>Priminimai</h2>
                <div>Gaukite pranešimus apie dokumentų galiojimo pabaigą.</div>
            </div>
            <div class=\"card\">
                <img src=\"{{ asset('images/edit.png') }}\" alt=\"Redagavimas\"/>
                <h2>Redagavimas</h2>
                <div>Redaguokite dokumentų informaciją: pavadinimą, pastabas, priminimo datą, kategorijas ir etiketes.</div>
            </div>
            <div class=\"card\">
                <img src=\"{{ asset('images/search.png') }}\" alt=\"Paieška\"/>
                <h2>Paieška</h2>
                <div>Suraskite reikiamus dokumentus pagal pavadinimą, įkėlimo ir priminimo datas, kategorijas, etiketes.</div>
            </div>
            <div class=\"card\">
                <img src=\"{{ asset('images/download.png') }}\" alt=\"Atsisiuntimas\"/>
                <h2>Atsisiuntimas</h2>
                <div>Atsisiųskite dokumentus į telefoną, planšetę ar kompiuterį.</div>
            </div>
        </div>
    {% endblock %}
{% endblock %}
", "home/index.html.twig", "/code/templates/home/index.html.twig");
    }
}
