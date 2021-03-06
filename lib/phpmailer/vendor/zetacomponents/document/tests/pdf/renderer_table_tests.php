<?php
/**
 * ezcDocumentPdfDriverTcpdfTests
 * 
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 * 
 *   http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 *
 * @package Document
 * @version //autogen//
 * @subpackage Tests
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

require_once 'base.php';

/**
 * Test suite for class.
 * 
 * @package Document
 * @subpackage Tests
 */
class ezcDocumentPdfTableRendererTests extends ezcDocumentPdfTestCase
{
    protected $document;
    protected $xpath;
    protected $styles;

    public static function suite()
    {
        return new PHPUnit_Framework_TestSuite( __CLASS__ );
    }

    public static function getTableDocuments()
    {
        return array(
            array( dirname( __FILE__ ) . '/../files/pdf/simple_tables.xml' ),
            array( dirname( __FILE__ ) . '/../files/pdf/tables_with_list.xml' ),
            array( dirname( __FILE__ ) . '/../files/pdf/stacked_table.xml' ),
            array( dirname( __FILE__ ) . '/../files/pdf/wrapped_table.xml' ),
            array( dirname( __FILE__ ) . '/../files/pdf/irregular_tables_1.xml' ),
            array( dirname( __FILE__ ) . '/../files/pdf/irregular_tables_2.xml' ),
            array( dirname( __FILE__ ) . '/../files/pdf/irregular_tables_3.xml' ),
        );
    }

    /**
     * @dataProvider getTableDocuments
     */
    public function testRenderTables( $file )
    {
        $this->renderFullDocument( $file, __CLASS__ . '_' . basename( $file, '.xml' ) . '.svg', array() );
    }
}

?>
