<?php

class LoadWebsiteTask extends sfBaseTask
{
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('csv_file', sfCommandArgument::REQUIRED, 'CSV File Path'),
    ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'website';
    $this->name             = 'load';
    $this->briefDescription = 'Import a CSV file corresponding to websites analyzed';
    $this->detailedDescription = <<<EOF
The [LoadWebsite|INFO] task import a csv file
Call it with:

  [php symfony LoadWebsite|INFO] csv_file_path
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    // add your code here
    $row = array();
    if (($handle = fopen($arguments['csv_file'], "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        list($url, $owner, $creator, $site_type, $created_at) = $data;

        $rows[] = array(
          'url'          => $url,
          'owner'        => $owner,
          'creator'      => $creator,
          'site_type_id' => $site_type == 'Marchand' ? 1 : 2,
          'created_at'   => $created_at
        );
      }
      fclose($handle);
    }

    $sites = array();
    foreach($rows as $k => $row)
    {
      $sites[$k] = new Site();
      $sites[$k]->setUrl($row['url']);
      $sites[$k]->setOwner($row['owner']);
      $sites[$k]->setCreator($row['creator']);
      $sites[$k]->setSiteTypeId($row['site_type_id']);
      $sites[$k]->setCreatedAt($row['created_at']);
      $sites[$k]->save();
      $this->logSection('Site', sprintf('Add a new site: %s', $sites[$k]->getUrl()));
    }
  }
}
