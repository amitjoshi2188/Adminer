

<?php
function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";
    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }
    $plugins = array(
        // specify enabled plugins here
        new AdminerSqlLog, //for maintaining query in log files.
        new AdminerEditCalendar, //for showing calender as date time picker.
        new FasterTablesFilter, // for searching table by name filter.
        new AdminerEnumOption, //for showing enum values in dropdown
        new AdminerColorfields, // for showing color where color code stored.
        new AdminerDisplayForeignKeyName, //for showing forign key tables first field name as per id.    
        new AdminerDumpZip, // for export in database or tabeles in zip format.
        new AdminerFloatThead,
		new AdminerDumpAlter,
        new AdminerJsonPreview()
        ); 
    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */
    
    return new AdminerPlugin($plugins);
}
// include original Adminer or Adminer Editor
include "plugins/adminer.php";
?>