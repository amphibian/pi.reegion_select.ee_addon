REEgion Select will display a dropdown <select> list of:

- countries (based on the ISO 3166-1 list of countries, dependent territories, and special areas of geographical interest)
- US states (based on the USPS official list of US states and possessions)
- Canadian provinces and territories
- UK counties
- Canadian provinces and US states together

Use the following EE tags to generate each type of dropdown:

`{exp:reegion_select:countries}`

`{exp:reegion_select:states}`

`{exp:reegion_select:provinces}`

`{exp:reegion_select:ukcounties}`

`{exp:reegion_select:provinces_states}`

REEgion Select accepts five optional parameters:

- `name=""`

   Value for the "name" attribute of the <select> menu. Defaults: "country", "state", "province", "county", "province_state".

- `codes="true"`

   Whether to use the ISO 3166-2 abbreviation as the <option> value for countries, states, and provinces.  Default is "false" (uses the region name as the value).

- `selected=""`

   Value of the <option> element that should be selected by default.

- `id=""`

   Value for the "id" attribute of the <select> menu.

- `class=""`

   Value for the "class" attribute of the <select> menu.

- `show=""`

   A pipe-delimited list of values to show, if you don't want all of the default values to display. (i.e. show="CA|NY|OH|MI")

- `null_divider="false"`

   Whether or not to include a divider option with a null value. Defaults to "true". 

Insipiration from - and props to - Nathan Pitman's [UK Counties Select and US States Select plugins](http://expressionengine.com/forums/viewthread/94799/), and Bridging Unit's [Countries Select plugin](http://expressionengine.com/forums/viewthread/106803/). Thanks to Tim Kelty for adding new parameters.