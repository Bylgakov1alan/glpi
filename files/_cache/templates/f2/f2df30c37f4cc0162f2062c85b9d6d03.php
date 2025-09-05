<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* components/user/info_card.html.twig */
class __TwigTemplate_4d72deecdc9590dc7864b57251c83080 extends Template
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
        // line 33
        yield "
";
        // line 34
        $context["enable_anonymization"] = (($context["enable_anonymization"]) ?? (false));
        // line 35
        yield "
<div class=\"p-0 user-info-card\">
   <div class=\"row\">
      <div class=\"col pt-1\">
         ";
        // line 39
        if ((($__internal_compile_0 = ($context["user"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["id"] ?? null) : null)) {
            // line 40
            yield "            ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "components/user/picture.html.twig", ["users_id" => (($__internal_compile_1 =             // line 41
($context["user"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["id"] ?? null) : null), "user_object" =>             // line 42
($context["user_object"] ?? null), "enable_anonymization" =>             // line 43
($context["enable_anonymization"] ?? null)]);
            // line 44
            yield "
         ";
        }
        // line 46
        yield "      </div>
      <div class=\"col-auto ms-2\">
         <h4 class=\"card-title mb-1\">
            ";
        // line 49
        if ((($__internal_compile_2 = ($context["user"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["id"] ?? null) : null)) {
            // line 50
            yield "               <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath("User", (($__internal_compile_3 = ($context["user"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["id"] ?? null) : null)), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_4 = ($context["user"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["user_name"] ?? null) : null), "html", null, true);
            yield "</a>
            ";
        } else {
            // line 52
            yield "               ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_5 = ($context["user"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["user_name"] ?? null) : null), "html", null, true);
            yield "
            ";
        }
        // line 54
        yield "         </h4>

         <div class=\"text-muted\">
            ";
        // line 57
        if ( !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_6 = ($context["user"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["login"] ?? null) : null))) {
            // line 58
            yield "                <div>
                    <i class=\"fa-fw fas fa-id-badge\"></i>
                    ";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_7 = ($context["user"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["login"] ?? null) : null), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 63
        yield "            ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (($__internal_compile_8 = ($context["user"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["email"] ?? null) : null)) > 0)) {
            // line 64
            yield "               <div>
                  <i class=\"fas fa-fw fa-envelope\"></i>
                  <a href=\"mailto:";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_9 = ($context["user"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["email"] ?? null) : null), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_10 = ($context["user"] ?? null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["email"] ?? null) : null), "html", null, true);
            yield "</a>
               </div>
            ";
        }
        // line 69
        yield "            ";
        if (( !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_11 = ($context["user"] ?? null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["phone"] ?? null) : null)) ||  !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_12 = ($context["user"] ?? null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["phone2"] ?? null) : null)))) {
            // line 70
            yield "               <div>
                  ";
            // line 71
            if ( !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_13 = ($context["user"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["phone"] ?? null) : null))) {
                // line 72
                yield "                     <i class=\"fas fa-fw fa-phone\"></i>
                     <a href=\"tel:";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_14 = ($context["user"] ?? null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["phone"] ?? null) : null), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_15 = ($context["user"] ?? null)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["phone"] ?? null) : null), "html", null, true);
                yield "</a>
                  ";
            }
            // line 75
            yield "                  ";
            if (( !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_16 = ($context["user"] ?? null)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16["phone"] ?? null) : null)) &&  !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_17 = ($context["user"] ?? null)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["phone2"] ?? null) : null)))) {
                // line 76
                yield "                     <span> - </span>
                  ";
            }
            // line 78
            yield "                  ";
            if ( !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_18 = ($context["user"] ?? null)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["phone2"] ?? null) : null))) {
                // line 79
                yield "                     <i class=\"fas fa-fw fa-phone\"></i>
                     <a href=\"tel:";
                // line 80
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_19 = ($context["user"] ?? null)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19["phone2"] ?? null) : null), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_20 = ($context["user"] ?? null)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20["phone2"] ?? null) : null), "html", null, true);
                yield "</a>
                  ";
            }
            // line 82
            yield "               </div>
            ";
        }
        // line 84
        yield "            ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (($__internal_compile_21 = ($context["user"] ?? null)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21["mobile"] ?? null) : null)) > 0)) {
            // line 85
            yield "               <div>
                  <i class=\"fas fa-fw fa-mobile\"></i>
                  <a href=\"tel:";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_22 = ($context["user"] ?? null)) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22["mobile"] ?? null) : null), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_23 = ($context["user"] ?? null)) && is_array($__internal_compile_23) || $__internal_compile_23 instanceof ArrayAccess ? ($__internal_compile_23["mobile"] ?? null) : null), "html", null, true);
            yield "</a>
               </div>
            ";
        }
        // line 90
        yield "            ";
        if (((($__internal_compile_24 = ($context["user"] ?? null)) && is_array($__internal_compile_24) || $__internal_compile_24 instanceof ArrayAccess ? ($__internal_compile_24["locations_id"] ?? null) : null) > 0)) {
            // line 91
            yield "               <div title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Location"), "html", null, true);
            yield "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\">
                  <i class=\"fas fa-fw fa-map-marker-alt\"></i>
                  ";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemName("Location", (($__internal_compile_25 = ($context["user"] ?? null)) && is_array($__internal_compile_25) || $__internal_compile_25 instanceof ArrayAccess ? ($__internal_compile_25["locations_id"] ?? null) : null)), "html", null, true);
            yield "
               </div>
            ";
        }
        // line 96
        yield "            ";
        if (((($__internal_compile_26 = ($context["user"] ?? null)) && is_array($__internal_compile_26) || $__internal_compile_26 instanceof ArrayAccess ? ($__internal_compile_26["usertitles_id"] ?? null) : null) > 0)) {
            // line 97
            yield "               <div title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(_x("person", "Title"), "html", null, true);
            yield "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\">
                  <i class=\"fas fa-fw fa-user-tie\"></i>
                  ";
            // line 99
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemName("UserTitle", (($__internal_compile_27 = ($context["user"] ?? null)) && is_array($__internal_compile_27) || $__internal_compile_27 instanceof ArrayAccess ? ($__internal_compile_27["usertitles_id"] ?? null) : null)), "html", null, true);
            yield "
               </div>
            ";
        }
        // line 102
        yield "            ";
        if (((($__internal_compile_28 = ($context["user"] ?? null)) && is_array($__internal_compile_28) || $__internal_compile_28 instanceof ArrayAccess ? ($__internal_compile_28["usercategories_id"] ?? null) : null) > 0)) {
            // line 103
            yield "               <div title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(_n("Category", "Categories", 1), "html", null, true);
            yield "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\">
                  <i class=\"fas fa-fw fa-user-tag\"></i>
                  ";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemName("UserCategory", (($__internal_compile_29 = ($context["user"] ?? null)) && is_array($__internal_compile_29) || $__internal_compile_29 instanceof ArrayAccess ? ($__internal_compile_29["usercategories_id"] ?? null) : null)), "html", null, true);
            yield "
               </div>
            ";
        }
        // line 108
        yield "            ";
        if (((($__internal_compile_30 = ($context["user"] ?? null)) && is_array($__internal_compile_30) || $__internal_compile_30 instanceof ArrayAccess ? ($__internal_compile_30["groups_id"] ?? null) : null) > 0)) {
            // line 109
            yield "               <div title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Default group"), "html", null, true);
            yield "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\">
                  <i class=\"fas fa-fw fa-users\"></i>
                  ";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemName("Group", (($__internal_compile_31 = ($context["user"] ?? null)) && is_array($__internal_compile_31) || $__internal_compile_31 instanceof ArrayAccess ? ($__internal_compile_31["groups_id"] ?? null) : null)), "html", null, true);
            yield "
               </div>
            ";
        }
        // line 114
        yield "         </div>
      </div>

      ";
        // line 117
        if (($context["can_edit"] ?? null)) {
            // line 118
            yield "         <div class=\"col\">
            <a class=\"btn btn-icon btn-sm btn-outline-secondary\" href=\"";
            // line 119
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("front/preference.php"), "html", null, true);
            yield "\"
               title=\"";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(__("Edit"), "html", null, true);
            yield "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\">
               <i class=\"fas fa-user-edit\"></i>
            </a>
         </div>
      ";
        }
        // line 125
        yield "   </div>
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/user/info_card.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  253 => 125,  245 => 120,  241 => 119,  238 => 118,  236 => 117,  231 => 114,  225 => 111,  219 => 109,  216 => 108,  210 => 105,  204 => 103,  201 => 102,  195 => 99,  189 => 97,  186 => 96,  180 => 93,  174 => 91,  171 => 90,  163 => 87,  159 => 85,  156 => 84,  152 => 82,  145 => 80,  142 => 79,  139 => 78,  135 => 76,  132 => 75,  125 => 73,  122 => 72,  120 => 71,  117 => 70,  114 => 69,  106 => 66,  102 => 64,  99 => 63,  93 => 60,  89 => 58,  87 => 57,  82 => 54,  76 => 52,  68 => 50,  66 => 49,  61 => 46,  57 => 44,  55 => 43,  54 => 42,  53 => 41,  51 => 40,  49 => 39,  43 => 35,  41 => 34,  38 => 33,);
    }

    public function getSourceContext()
    {
        return new Source("{#
 # ---------------------------------------------------------------------
 #
 # GLPI - Gestionnaire Libre de Parc Informatique
 #
 # http://glpi-project.org
 #
 # @copyright 2015-2024 Teclib' and contributors.
 # @copyright 2003-2014 by the INDEPNET Development Team.
 # @licence   https://www.gnu.org/licenses/gpl-3.0.html
 #
 # ---------------------------------------------------------------------
 #
 # LICENSE
 #
 # This file is part of GLPI.
 #
 # This program is free software: you can redistribute it and/or modify
 # it under the terms of the GNU General Public License as published by
 # the Free Software Foundation, either version 3 of the License, or
 # (at your option) any later version.
 #
 # This program is distributed in the hope that it will be useful,
 # but WITHOUT ANY WARRANTY; without even the implied warranty of
 # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 # GNU General Public License for more details.
 #
 # You should have received a copy of the GNU General Public License
 # along with this program.  If not, see <https://www.gnu.org/licenses/>.
 #
 # ---------------------------------------------------------------------
 #}

{% set enable_anonymization = enable_anonymization ?? false %}

<div class=\"p-0 user-info-card\">
   <div class=\"row\">
      <div class=\"col pt-1\">
         {% if user['id'] %}
            {{ include('components/user/picture.html.twig', {
               'users_id': user['id'],
               'user_object': user_object,
               'enable_anonymization': enable_anonymization
            }) }}
         {% endif %}
      </div>
      <div class=\"col-auto ms-2\">
         <h4 class=\"card-title mb-1\">
            {% if user['id'] %}
               <a href=\"{{ 'User'|itemtype_form_path(user['id']) }}\">{{ user['user_name'] }}</a>
            {% else %}
               {{ user['user_name'] }}
            {% endif %}
         </h4>

         <div class=\"text-muted\">
            {% if user['login'] is not empty %}
                <div>
                    <i class=\"fa-fw fas fa-id-badge\"></i>
                    {{ user['login'] }}
                </div>
            {% endif %}
            {% if user['email']|length > 0 %}
               <div>
                  <i class=\"fas fa-fw fa-envelope\"></i>
                  <a href=\"mailto:{{ user['email'] }}\">{{ user['email'] }}</a>
               </div>
            {% endif %}
            {% if not user['phone'] is empty or not user['phone2'] is empty %}
               <div>
                  {% if not user['phone'] is empty %}
                     <i class=\"fas fa-fw fa-phone\"></i>
                     <a href=\"tel:{{ user['phone'] }}\">{{ user['phone'] }}</a>
                  {% endif %}
                  {% if not user['phone'] is empty and not user['phone2'] is empty %}
                     <span> - </span>
                  {% endif %}
                  {% if not user['phone2'] is empty %}
                     <i class=\"fas fa-fw fa-phone\"></i>
                     <a href=\"tel:{{ user['phone2'] }}\">{{ user['phone2'] }}</a>
                  {% endif %}
               </div>
            {% endif %}
            {% if user['mobile']|length > 0 %}
               <div>
                  <i class=\"fas fa-fw fa-mobile\"></i>
                  <a href=\"tel:{{ user['mobile'] }}\">{{ user['mobile'] }}</a>
               </div>
            {% endif %}
            {% if user['locations_id'] > 0 %}
               <div title=\"{{ 'Location'|itemtype_name }}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\">
                  <i class=\"fas fa-fw fa-map-marker-alt\"></i>
                  {{ get_item_name('Location', user['locations_id']) }}
               </div>
            {% endif %}
            {% if user['usertitles_id'] > 0 %}
               <div title=\"{{ _x('person', 'Title') }}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\">
                  <i class=\"fas fa-fw fa-user-tie\"></i>
                  {{ get_item_name('UserTitle', user['usertitles_id']) }}
               </div>
            {% endif %}
            {% if user['usercategories_id'] > 0 %}
               <div title=\"{{ _n('Category', 'Categories', 1) }}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\">
                  <i class=\"fas fa-fw fa-user-tag\"></i>
                  {{ get_item_name('UserCategory', user['usercategories_id']) }}
               </div>
            {% endif %}
            {% if user['groups_id'] > 0 %}
               <div title=\"{{ __('Default group') }}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\">
                  <i class=\"fas fa-fw fa-users\"></i>
                  {{ get_item_name('Group', user['groups_id']) }}
               </div>
            {% endif %}
         </div>
      </div>

      {% if can_edit %}
         <div class=\"col\">
            <a class=\"btn btn-icon btn-sm btn-outline-secondary\" href=\"{{ path('front/preference.php') }}\"
               title=\"{{ __('Edit') }}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\">
               <i class=\"fas fa-user-edit\"></i>
            </a>
         </div>
      {% endif %}
   </div>
</div>
", "components/user/info_card.html.twig", "/var/www/html/glpi/templates/components/user/info_card.html.twig");
    }
}
