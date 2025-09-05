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

/* components/group/info_card.html.twig */
class __TwigTemplate_d646ac5ef28a6ad6ea509c1a3b715c73 extends Template
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
<div class=\"p-0 group-info-card\">
   <div class=\"row\">
      <h4 class=\"card-title mb-1\">
         ";
        // line 37
        if ((($__internal_compile_0 = ($context["group"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["id"] ?? null) : null)) {
            // line 38
            yield "            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath("Group", (($__internal_compile_1 = ($context["group"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["id"] ?? null) : null)), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_2 = ($context["group"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["group_name"] ?? null) : null), "html", null, true);
            yield "</a>
         ";
        } else {
            // line 40
            yield "            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_3 = ($context["group"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["group_name"] ?? null) : null), "html", null, true);
            yield "
         ";
        }
        // line 42
        yield "      </h4>

      <div class=\"text-muted\">
         ";
        // line 45
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (($__internal_compile_4 = ($context["group"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["comment"] ?? null) : null)) > 0)) {
            // line 46
            yield "            <div>
               <i class=\"ti ti-notes\"></i>
               ";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($__internal_compile_5 = ($context["group"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["comment"] ?? null) : null), "html", null, true);
            yield "
            </div>
         ";
        }
        // line 51
        yield "      </div>
   </div>
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/group/info_card.html.twig";
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
        return array (  77 => 51,  71 => 48,  67 => 46,  65 => 45,  60 => 42,  54 => 40,  46 => 38,  44 => 37,  38 => 33,);
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

<div class=\"p-0 group-info-card\">
   <div class=\"row\">
      <h4 class=\"card-title mb-1\">
         {% if group['id'] %}
            <a href=\"{{ 'Group'|itemtype_form_path(group['id']) }}\">{{ group['group_name'] }}</a>
         {% else %}
            {{ group['group_name'] }}
         {% endif %}
      </h4>

      <div class=\"text-muted\">
         {% if group['comment']|length > 0 %}
            <div>
               <i class=\"ti ti-notes\"></i>
               {{ group['comment'] }}
            </div>
         {% endif %}
      </div>
   </div>
</div>
", "components/group/info_card.html.twig", "/var/www/html/glpi/templates/components/group/info_card.html.twig");
    }
}
