<?php

use Illuminate\Database\Seeder;

class TemplevaludetTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('templevaludet')->delete();
        
        \DB::table('templevaludet')->insert(array (
            0 => 
            array (
                'templno' => '1',
                'templdetno' => '1',
                'scope' => 'BEHAVIORS',
                'category' => 'BEHAVIORS',
                'templdet_desc' => 'The medical staff member understands and supports the hospital?s code of behavior and the identification of acceptable and unacceptable behaviors',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'templno' => '1',
                'templdetno' => '10',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Medical and Clinical Knowledge',
                'templdet_desc' => 'Application of clinical practice guidelines including adaptation & revision of guidelines',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'templno' => '1',
                'templdetno' => '11',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Medical and Clinical Knowledge',
                'templdet_desc' => 'Participation in Professional Conferences',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'templno' => '1',
                'templdetno' => '12',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Medical and Clinical Knowledge',
                'templdet_desc' => 'Publications',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'templno' => '1',
                'templdetno' => '13',
                'scope' => 'PROFESSIONAL GROWTH',
            'category' => 'Practice-based Learning and Improvement (PBLI)',
                'templdet_desc' => 'Acquiring new clinical privilege based on study',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'templno' => '1',
                'templdetno' => '14',
                'scope' => 'PROFESSIONAL GROWTH',
            'category' => 'Practice-based Learning and Improvement (PBLI)',
                'templdet_desc' => 'Acquiring new Skills',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'templno' => '1',
                'templdetno' => '15',
                'scope' => 'PROFESSIONAL GROWTH',
            'category' => 'Practice-based Learning and Improvement (PBLI)',
                'templdet_desc' => 'Sharing in Hospital/scientific activities',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'templno' => '1',
                'templdetno' => '16',
                'scope' => 'PROFESSIONAL GROWTH',
            'category' => 'Practice-based Learning and Improvement (PBLI)',
                'templdet_desc' => 'Full participation in meeting requirements of professional specialty ',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'templno' => '1',
                'templdetno' => '17',
                'scope' => 'PROFESSIONAL GROWTH',
            'category' => 'Practice-based Learning and Improvement (PBLI)',
                'templdet_desc' => 'Continuing education requirements for licensure',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'templno' => '1',
                'templdetno' => '18',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Interpersonal & Communication Skills',
                'templdet_desc' => 'Fosters a therapeutic and ethical relationship with patients/families.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'templno' => '1',
                'templdetno' => '19',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Interpersonal & Communication Skills',
                'templdet_desc' => 'Fosters a collegial and ethical relationship with members of the healthcare team.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'templno' => '1',
                'templdetno' => '2',
                'scope' => 'BEHAVIORS',
                'category' => 'BEHAVIORS',
                'templdet_desc' => 'Absence of reported behaviors by the medical staff member that are identified as unacceptable',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'templno' => '1',
                'templdetno' => '20',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Interpersonal & Communication Skills',
                'templdet_desc' => 'Timely, appropriate, and effective communication that facilitates continuity of care and consistency of treatment plan when assuming care of patients and when handing off to next practitioner.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'templno' => '1',
                'templdetno' => '21',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Interpersonal & Communication Skills',
                'templdet_desc' => 'Effective as a member of the interdisciplinary healthcare team.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'templno' => '1',
                'templdetno' => '22',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Professionalism',
                'templdet_desc' => 'Responsive, accountable, and committed to patients, the hospital, and the healthcare team.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'templno' => '1',
                'templdetno' => '23',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Professionalism',
                'templdet_desc' => 'Timely response to pages, calls, consultations and/or phone messages from members of the healthcare team.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'templno' => '1',
                'templdetno' => '24',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Professionalism',
                'templdet_desc' => 'Demonstrates ethical principles: provision/withholding of clinical care, confidentiality, informed consent, and clinical practices.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'templno' => '1',
                'templdetno' => '25',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Professionalism',
                'templdet_desc' => 'Practitioner has the physical/mental ability to safely render care.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'templno' => '1',
                'templdetno' => '26',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Professionalism',
                'templdet_desc' => 'Opinion Leader within the medical staff on clinical & professional issues',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'templno' => '1',
                'templdetno' => '27',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Professionalism',
                'templdet_desc' => 'Community Participation',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'templno' => '1',
                'templdetno' => '28',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Systems-based Practice',
                'templdet_desc' => 'Compliance with Medical Record Documentation',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'templno' => '1',
                'templdetno' => '29',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Systems-based Practice',
                'templdet_desc' => 'Abide with hospital systems, bylaws, policies and procedures',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'templno' => '1',
                'templdetno' => '3',
                'scope' => 'BEHAVIORS',
                'category' => 'BEHAVIORS',
                'templdet_desc' => 'The medical staff member understands and supports the hospital?s code of behavior and the identification of acceptable and unacceptable behaviors',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'templno' => '1',
                'templdetno' => '30',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Systems-based Practice',
                'templdet_desc' => 'Abide with hospital clinical practice guidelines.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'templno' => '1',
                'templdetno' => '31',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Systems-based Practice',
                'templdet_desc' => 'Abide with infection control guidelines',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'templno' => '1',
                'templdetno' => '32',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Stewardship of Resources',
                'templdet_desc' => 'Compliance with medication use inside the hospital',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'templno' => '1',
                'templdetno' => '33',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Stewardship of Resources',
                'templdet_desc' => 'Compliance with antibiotic policy inside the hospital',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'templno' => '1',
                'templdetno' => '34',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Stewardship of Resources',
                'templdet_desc' => 'Compliance with blood use inside the hospital',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'templno' => '1',
                'templdetno' => '35',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Stewardship of Resources',
                'templdet_desc' => 'Compliance with Laboratory Investigations use',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'templno' => '1',
                'templdetno' => '36',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Stewardship of Resources',
                'templdet_desc' => 'Compliance with Radiological Procedures use',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'templno' => '1',
                'templdetno' => '37',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Stewardship of Resources',
                'templdet_desc' => 'Participation in key purchasing decisions within practice area',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'templno' => '1',
                'templdetno' => '38',
                'scope' => 'CLINICAL RESULTS',
                'category' => 'Volumes',
                'templdet_desc' => 'Number of admissions',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'templno' => '1',
                'templdetno' => '39',
                'scope' => 'CLINICAL RESULTS',
                'category' => 'Volumes',
                'templdet_desc' => 'Number of procedures',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'templno' => '1',
                'templdetno' => '4',
                'scope' => 'BEHAVIORS',
                'category' => 'BEHAVIORS',
                'templdet_desc' => 'Absence of reported behaviors by the medical staff member that are identified as unacceptable',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'templno' => '1',
                'templdetno' => '40',
                'scope' => 'CLINICAL RESULTS',
                'category' => 'Volumes',
                'templdet_desc' => 'Number of outpatient visits',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'templno' => '1',
                'templdetno' => '41',
                'scope' => 'CLINICAL RESULTS',
                'category' => 'Outcome indicator',
                'templdet_desc' => 'Unacceptable Morbidity Rate',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'templno' => '1',
                'templdetno' => '42',
                'scope' => 'CLINICAL RESULTS',
                'category' => 'Outcome indicator',
                'templdet_desc' => 'Avoidable Mortality Rate',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'templno' => '1',
                'templdetno' => '43',
                'scope' => 'CLINICAL RESULTS',
                'category' => 'Outcome indicator',
                'templdet_desc' => 'Medication Error Rate due to Wrong Prescribing',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'templno' => '1',
                'templdetno' => '44',
                'scope' => 'CLINICAL RESULTS',
                'category' => 'Outcome indicator',
                'templdet_desc' => 'Infection due to non compliance with infection control',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'templno' => '1',
                'templdetno' => '45',
                'scope' => 'OTHER COMPETENCY ITEMS ',
                'category' => '',
                'templdet_desc' => 'Involvement in PI projects and policy making',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'templno' => '1',
                'templdetno' => '46',
                'scope' => 'OTHER COMPETENCY ITEMS ',
                'category' => '',
                'templdet_desc' => 'Attending Training Activities about quality & safety',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'templno' => '1',
                'templdetno' => '47',
                'scope' => 'OTHER COMPETENCY ITEMS ',
                'category' => '',
                'templdet_desc' => 'Member of safety, tracer, accreditation team',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'templno' => '1',
                'templdetno' => '48',
                'scope' => 'OTHER COMPETENCY ITEMS ',
                'category' => '',
                'templdet_desc' => 'Member of Hospital wide committee',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'templno' => '1',
                'templdetno' => '49',
                'scope' => 'OTHER COMPETENCY ITEMS ',
                'category' => '',
                'templdet_desc' => 'Sharing in training activities related to IPSGs',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'templno' => '1',
                'templdetno' => '5',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Patient Care',
                'templdet_desc' => 'Patient assessments are comprehensive, accurate, and current.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'templno' => '1',
                'templdetno' => '50',
                'scope' => 'OTHER COMPETENCY ITEMS ',
                'category' => '',
                'templdet_desc' => 'Compliance & Respect to Patient Rights',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'templno' => '1',
                'templdetno' => '51',
                'scope' => 'OTHER COMPETENCY ITEMS ',
                'category' => '',
                'templdet_desc' => 'Speaker at national/international presentations',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'templno' => '1',
                'templdetno' => '6',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Patient Care',
                'templdet_desc' => 'Appropriate & Effective care plan ',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'templno' => '1',
                'templdetno' => '7',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Patient Care',
                'templdet_desc' => 'Appropriate and timely utilization of consultations.',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'templno' => '1',
                'templdetno' => '8',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Patient Care',
                'templdet_desc' => 'Compliance with Daily Patient Rounds',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'templno' => '1',
                'templdetno' => '9',
                'scope' => 'PROFESSIONAL GROWTH',
                'category' => 'Patient Care',
                'templdet_desc' => 'Compliance with average length of stay',
                'templdet_desc_ar' => NULL,
                'templdet_score' => NULL,
                'templdet_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}