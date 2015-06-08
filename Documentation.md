# Creating The Reader Object #

> `$data = new Spreadsheet_Excel_Reader("test.xls");`

Or conserve memory for large worksheets by not storing the extended information about cells like fonts, colors, etc.

> `$data = new Spreadsheet_Excel_Reader("test.xls",false);`

To use a coding other than UTF-8 (default) you can pass it as the 3rd parameter.

> `$data = new Spreadsheet_Excel_Reader("test.xls",true,"UTF-16");`

# Dumping Worksheet Contents #

The simplest way to interact with an XLS file is to just dump it to HTML for display in a browser. This method will generate a table with inline CSS and all available formatting.

> `$data->dump($row_numbers=false,$col_letters=false,$sheet=0,$table_class='excel')`

# Accessing Cell Values #

It is recommended that the public API functions be used to access data rather than relying on the underlying data structure, which may change between releases.

Retrieve the formatted value of a cell (what is displayed by Excel) on the first (or only) worksheet:

> `$data->val($row,$col)`

You can also use column names rather than numbers:

> `$data->val(10,'AZ')`

Access data on a different sheet:

> `$data->val($row,$col,$sheet_index)`

# Sheet Info #

Get the count of how many rows/cols are on a sheet (default: first sheet):

> `$data->rowcount($sheet_index=0)`
> `$data->colcount($sheet_index=0)`

# Cell Info #

The type of data in the cell: number|date|unknown

> `$data->type($row,$col,$sheet=0)`

The raw data stored for the cell. For example, a cell may contain 123.456 but display as 123.5 because of the cell's format. Raw accesses the underlying value.

> `$data->raw($row,$col,$sheet=0)`

If the cell has a hyperlink associated with it, the url can be retrieved.

> `$data->hyperlink($row,$col,$sheet=0)`

Rowspan/Colspan of the cell.

> `$data->rowspan($row,$col,$sheet=0)`
> `$data->colspan($row,$col,$sheet=0)`

# Formatting Details #

The **style** method retrieves all available formatting information and returns a CSS string with all attributes.

> `$data->style($row,$col,$sheet=0)`

The format string for the cell.

> `$data->format($row,$col,$sheet=0)`

Cell alignment. Either 'right', 'center', or '' (left)

> `$data->align($row,$col,$sheet=0)`

Background color, in #FFFFFF format.

> `$data->bgColor($row,$col,$sheet=0)`

Get border type for any of the cell's sides. Possible return values are:
  * Thin
  * Medium
  * Dashed
  * Dotted
  * Thick
  * Double
  * Hair
  * Medium dashed
  * Thin dash-dotted
  * Medium dash-dotted
  * Thin dash-dot-dotted
  * Medium dash-dot-dotted
  * Slanted medium dash-dotted

> `$data->borderLeft($row,$col,$sheet=0)`

> `$data->borderRight($row,$col,$sheet=0)`

> `$data->borderTop($row,$col,$sheet=0)`

> `$data->borderBottom($row,$col,$sheet=0)`

Get the color of each of the borders, in #FFFFFF format.

> `$data->borderLeftColor($row,$col,$sheet=0)`

> `$data->borderRightColor($row,$col,$sheet=0)`

> `$data->borderTopColor($row,$col,$sheet=0)`

> `$data->borderBottomColor($row,$col,$sheet=0)`

The font color, which may be determined either by cell properties or by format properties, in #FFFFFF format.

> `$data->color($row,$col,$sheet=0)`

Other font properties:

> `$data->bold($row,$col,$sheet=0) // Boolean `

> `$data->italic($row,$col,$sheet=0) // Boolean `

> `$data->underline($row,$col,$sheet=0) // Boolean `

> `$data->height($row,$col,$sheet=0) // Number in pixels `

> `$data->font($row,$col,$sheet=0) // Font name `
