<style>
    #tenweb_config_table {
        width: 95%;
    }

    #tenweb_config_table td {
        border: 1px solid #c4c4c4;
        padding: 12px;
    }

    #tenweb_config_table td:nth-child(1) {
        width: 25%;
    }

    #tenweb_config_table td:nth-child(2) {
        width: 40%;
    }

    #tenweb_save_config {
        padding: 6px;
        margin-bottom: 6px;
    }
</style>

<h2><?php echo "Configs: " ?></h2>
<button id="tenweb_save_config">Save</button>
<table id="tenweb_config_table">
    <tbody>
    <thead>
    <tr>
        <th>Label</th>
        <th>Value</th>
        <th>Default Value</th>
    </tr>
    </thead>
    <tr>
        <td><label for="tenweb_migration_debug">TENWEB_MIGRATION_DEBUG:</label></td>
        <td><input type="text" id="tenweb_migration_debug"
                   value="<?php echo TENWEB_MIGRATION_DEBUG; ?>"></td>
        <td>0</td>
    </tr>
    <tr>
        <td><label for="tenweb_migration_archive_type">TENWEB_MIGRATION_ARCHIVE_TYPE: </label></td>
        <td>
            <select id="tenweb_migration_archive_type">
                <option value="gzip" <?php echo TENWEB_MIGRATION_ARCHIVE_TYPE == "gzip" ? "selected" : ""; ?> >gzip
                </option>
                <option value="zip" <?php echo TENWEB_MIGRATION_ARCHIVE_TYPE == "zip" ? "selected" : ""; ?>>zip
                </option>
            </select>
        </td>
        <td><?php echo TENWEB_MIGRATION_MAX_FILES_RESTART_DEFAULT; ?></td>
    </tr>
    <tr>
        <td><label for="tenweb_migration_max_files_restart">TENWEB_MIGRATION_MAX_FILES_RESTART:</label></td>
        <td><input type="text" id="tenweb_migration_max_files_restart"
                   value=<?php echo TENWEB_MIGRATION_MAX_FILES_RESTART; ?>></td>
        <td><?php echo TENWEB_MIGRATION_MAX_FILES_RESTART_DEFAULT; ?></td>
    </tr>
    <tr>
        <td><label for="tenweb_migration_bulk_files_count">TENWEB_MIGRATION_BULK_FILES_COUNT:</label></td>
        <td><input type="text" id="tenweb_migration_bulk_files_count"
                   value=<?php echo TENWEB_MIGRATION_BULK_FILES_COUNT; ?>></td>
        <td><?php echo TENWEB_MIGRATION_BULK_FILES_COUNT_DEFAULT; ?></td>
    </tr>
    <tr>
        <td><label for="tenweb_migration_bulk_db_rows_count">TENWEB_MIGRATION_BULK_DB_ROWS_COUNT:</label></td>
        <td><input type="text" id="tenweb_migration_bulk_db_rows_count"
                   value=<?php echo TENWEB_MIGRATION_BULK_DB_ROWS_COUNT; ?>></td>
        <td><?php echo TENWEB_MIGRATION_BULK_DB_ROWS_COUNT_DEFAULT; ?></td>
    </tr>
    <tr>
        <td><label for="tenweb_migration_exec_time_offset">TENWEB_MIGRATION_EXEC_TIME_OFFSET:</label></td>
        <td><input type="text" id="tenweb_migration_exec_time_offset"
                   value=<?php echo TENWEB_MIGRATION_EXEC_TIME_OFFSET; ?>></td>
        <td><?php echo TENWEB_MIGRATION_EXEC_TIME_OFFSET_DEFAULT; ?></td>
    </tr>
    </tbody>
</table>