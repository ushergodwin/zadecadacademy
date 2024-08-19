<?php

namespace Database\Seeders;

use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Program::insert([
            [
                'pg_image' => '633387715.jpg',
                'pg_name' => 'RC and Steel Structural Analysis and Design',
                'description' => 'In this course you will learn about the analysis and design of Reinforced Concrete (RC) and Steel buildings, and discover how structural engineering is both a scientific discipline and logical form. Which is also a sub-discipline of civil engineering in which structural engineers are trained to design the ‘bones and muscles’ that create the form and shape of manmade structures.',
                'software' => 'ProtaStructure,Tekla Structural Designer, STAAD Pro V8i , AutoCAD Advanced Steel',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '359426204.jpg',
                'pg_name' => 'Water pipe network distribution design',
                'description' => 'One of the most important aspects in the design of water supply and irrigation systems is the design of an optimal system. From choosing the right layout of the system after mapping to setting/assigning demands to the target nodes. The main focus of this course is to help design engineers to understand the most important steps taken in design and simulation of water systems by using Epanet and the Associate software (Google Earth/AutoCad).',
                'software' => 'EPANET',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '607459331.jpg',
                'pg_name' => 'Architectural 2D and 3D Building Design',
                'description' => 'During the course, students will be acquainted with the technology for creating 2D and 3D drawings. The trainer will describe the means of conceptual design, detail and documentation. You will gain experience that will help and inspire you to advance in your personal and professional development. You will attain skills in a practical way with the help of sample project design and assignments.',
                'software' => 'ArchiCAD, AutoCAD, Revit Architecture',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '598102868.jpg',
                'pg_name' => 'Architectural Designs',
                'description' => 'Architectural visualization helps architects and designers work collaboratively and communicate ideas more efficiently. It is a modern way of creating three-dimensional model visual presentation of a structure like a building using computer software. It is made for clients to walk around, explore a 3D model, and view it from any angle as realistic as built.
                    This course, regardless of your industry background, will share concepts of Architectural 3D Visualization from a beginner to expert level. It is suitable for architects, urban planners, visualization artists, real estate professionals, Architecture students, interior designers, landscape designers and Design consultants.',
                'software' => 'Twinmotion, V-Ray for 3Ds Max',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '254507219.jpg',
                'pg_name' => 'BOQ and Material schedules preparation',
                'description' => 'Quantity surveying and construction costing professionals have been struggling with manual calculations. That cannot control, validate, or standardize any of the inputs or formula calculations within each estimate; it is time for a better, more accurate estimate. That is why we bring you the BoQ preparation course with Planswift for professionals like you.
                    Get trained by software approved and highly experienced quantity surveyors. this course aims to sharpen you on how to develop outstanding BoQ, time-phased budgets, forecasts, and measuring project performance and productivity using cost, hour, and quantity control elements in the easiest way than ever using Planswift.',
                'software' => 'Planswift',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '794274892.jpg',
                'pg_name' => 'Highways and Roads Design',
                'description' => 'As urban and residential areas grow, addressing the layouts and configurations for modern, sustainable design becomes mandatory. Throughout the Bootcamp, we will teach you the tools to optimize your civil highway and road designs for efficiency and safety while minimizing project costs. You will practice real-world design and production workflows with hands-on exercises and datasets so that you can practice as you learn. As a result, you will deliver stronger, more robust designs that meet project requirements. Therefore, the basics of design for highways are discussed in the scope of the Manual Design Criteria approach. The design and analysis steps for highway elements are also discussed in the Ministry of Works and Transport’s Road Design Manual (Volume 1: Geometric Design).',
                'software' => 'AutoCAD Civil 3D,Infraworks, 3Ds Max',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '709548581.jpg',
                'pg_name' => 'Mechanical HVAC Design',
                'description' => 'Heating, ventilation, and air conditioning (HVAC) is the use of various technologies to control the temperature, humidity, and purity of the air in an enclosed space. Its goal is to provide thermal comfort and acceptable indoor air quality.
                    Applying mechanical engineering theoretical concepts such as thermodynamics, heat transfer, fluid mechanics, you will translate these theories into valuable and applicable skill that is specific to HVAC industry. Equal friction method for duct sizing, analyzing heat load in space, design of VRF systems (centralized Systems) by using software.',
                'software' => 'AutoCAD MEP',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '900263648.jpg',
                'pg_name' => 'Plumbing and Drainage system design',
                'description' => 'This course has been crafted to deliver plumbing and water professionals with comprehensive skills in areas related to water supply and drainage systems. Our project delivery-based training aims to help you understand and design plumbing projects from scratch with confidence. After participating in this course, you will be able to know the key design considerations for building plumbing and drainage systems, apply codes and standards, make sound materials selection decisions, select specific equipment and corresponding piping, and understand why and when specialized piping is used.

                    Plumbing and Drainage Design course train the kinds of drainage systems, supply water distribution systems to hot water systems with the smart system design & energy upkeep. Plumbing is one of the most critical features of the building design for the delivery and use of water in a building. Learn to produce plumbing and piping systems that work within the specific needs or specifications of a building or construction project.',
                'software' => 'AutoCAD MEP',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '672445763.jpg',
                'pg_name' => 'Electrical Systems Design',
                'description' => 'Due to drastic changes in electrical engineering industry, need of the trained electrical individuals is growing hurriedly. There will be an increase of 24% in occupations for skilled electrical pros by the close of this decade because power utilization has been increasing over the past few years, most rapidly. We introduce to you the innovative electrical design skills development course, which intends to tackle the planning, creating, testing or supervising the development and installation of electrical equipment, including lighting equipment, power systems, power distribution, fire alarms, life safety systems and other related systems',
                'software' => 'AutoCAD Electrical',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '953410234.jpg',
                'pg_name' => 'Product Design and Manufacturing',
                'description' => 'Providing a full product design skillset, necessary to accelerate the design, virtual prototyping and manufacturing process. An emphasis of this course is put on practical work and timesaving tips and tricks directly drawn from the professional world. Through this course, you will also benefit from skills on how to structure an engineering design project. We provide high-level professional practices on 3D mechanical design, documentation, and product simulation tools. Work efficiently with a powerful blend of parametric, direct, freeform, and rules-based design capabilities. That is why, we introduce to you the product design and manufacturing skills development course.',
                'software' => 'AutoCAD, Solidworks, Inventor',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '503088455.png',
                'pg_name' => 'Project & BIM Management',
                'description' => 'The project management course is designed for almost all construction project members either in office or on-site works, from site agent to the managing director because we know that having skills on the software that helps you in planning and scheduling your project performance and back it with understanding the philosophy or technical theories needed by a professional project manager is a must. You will also be able to organize projects, control access to projects, organize and control resources and in effective planning, monitoring and controlling any construction project.',
                'software' => 'MS Project, Primavera, Navisworks',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '365316508.jpg',
                'pg_name' => 'Physical planning and Land surveying',
                'description' => 'Physical Planning is the active process of organizing the physical activities and land uses in order to ensure orderly and eﬀective siting and coordination of land uses. It encompasses deliberate determination of spatial plans with an aim of achieving optimum level of land utilization in a sustainable manner. Land surveying is the technique, profession, art, and science of determining the terrestrial two-dimensional or three-dimensional positions of points and the distances and angles between them.

Through the course, you will learn different CAD software to aid spatial analysis and modeling, which can contribute to a variety of important urban planning tasks. These tasks include site selection, land suitability analysis, land use and transport modeling, the identification of planning action areas, and impact assessments.',
                'software' => 'ArcGIS,AutoCAD,AutoCAD Civil 3D',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '326073055.jpg',
                'pg_name' => 'Public Health & Environmentalists',
                'description' => 'Environmental and public health focuses on the relationships between people and their environment; promotes human health and well-being; and fosters healthy and safe communities. Environmental health is a key part of any comprehensive public health system.

                    This course trains health and environmental professionals with the essential skills to map and analyze routinely collected health and environmental data. You will also learn what data and methods are used to detect areas of high disease risk and to compare these with geographic patterns of health and environment service delivery.',
                'software' => 'ArcGIS, Stata 12, SPSS Statistics 20',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '943792091.jpg',
                'pg_name' => 'Graphic Design',
                'description' => 'Graphic Design is the art or skill of combining text and pictures in advertisements, magazines or books. Graphic design is made up of several key concepts that anyone interested in pursuing this art form needs to know. In this course, you’ll learn the four cornerstones of graphic design; shape, typography, color, and composition. You’ll discover how to mold your ideas around these key concepts and create a visual universe based on your imagination, creativity, and graphic resources.',
                'software' => 'Photoshop, Illustrator, InDesign, AfterEffects',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '242489319.jpg',
                'pg_name' => 'Photo editing',
                'description' => 'Gain full mastery of the most useful and powerful tools in Photoshop and Lightroom, the best software for professional photo editing. Learn how to take full advantage of your images in this course. It will teach you in-depth and from scratch how to use layers, selections, channels, and masks like a pro. In this course you will learn, step by step, all the basic concepts of photo editing and the most important tools for retouching and color balance to handle your first photographs like a professional.',
                'software' => 'Photoshop, Lightroom',
                'created_at' => Carbon::now()
            ],
            [
                'pg_image' => '737165044.jpg',
                'pg_name' => 'Video editing',
                'description' => "If you want to master Adobe Premiere Pro and edit videos like a professional, this course is for you. It will teach you the essential skills needed for reaching your goal. You will learn how to create and establish a good workflow to achieve optimal results for your visual projects. You will learn the ins and outs of Premiere Pro to create high-quality videos, whether you're just getting started in video editing or you already have some experience.",
                'software' => 'Premiere Pro',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
