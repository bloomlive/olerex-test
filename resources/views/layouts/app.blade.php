<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .h-5 {
            height: 1.25rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }


        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito';
        }

        .text-color-red {
            color: #ff0000 !important;
        }

        table {
            min-width: 640px;
        }
    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <a href="{{route('table')}}">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 207.415863 83.6354294" style="enable-background:new 0 0 207.415863 83.6354294;" xml:space="preserve" class="h-16 w-auto text-gray-700 sm:h-20">
                <style type="text/css">
                    .st0 {
                        fill: #FFD600;
                    }

                    .st1 {
                        fill-rule: evenodd;
                        clip-rule: evenodd;
                    }

                    th {
                        text-align: left;
                    }

                    td {
                        padding: 8px 0;
                    }

                    .table__row--new-item td {
                        padding-top: 16px;
                    }
                </style>
                    <rect class="st0" width="207.415863" height="83.6354294"/>
                    <path class="st1"
                          d="M45.2379684,30.4880581c-2.1186523,0-3.7691498,0.9931889-4.9433212,2.985384  c-1.1809998,1.9810905-1.7638397,4.7907715-1.7638397,8.4099045c0,3.6303177,0.58284,6.4405975,1.7638397,8.4217529  c1.1741714,1.9915314,2.8246689,2.9821053,4.9433212,2.9821053c2.1242104,0,3.7651978-0.984684,4.9325485-2.9631653  c1.1620636-1.962822,1.7383461-4.785553,1.7383461-8.4406929c0-3.6302414-0.581501-6.4425316-1.7475128-8.4321175  C48.9911232,31.4734173,47.3500633,30.4880581,45.2379684,30.4880581L45.2379684,30.4880581z M31.8693466,41.8860245  c0-3.9348068,1.2483101-7.146946,3.7407112-9.6331253c2.49963-2.4855766,5.7019272-3.7328815,9.6279106-3.7328815  c3.9393616,0,7.1459427,1.2420864,9.6317902,3.717226c2.4764099,2.4855118,3.7139473,5.7002563,3.7139473,9.6487808  c0,3.9543533-1.2375374,7.1717072-3.7139473,9.6552811c-2.4858475,2.4881859-5.6924286,3.7354927-9.6317902,3.7354927  c-3.9259834,0-7.1282806-1.2473068-9.6279106-3.7413826C33.1176567,49.0387993,31.8693466,45.8214455,31.8693466,41.8860245  L31.8693466,41.8860245z M81.0176086,54.8285789H61.189785v-0.8448563c0-0.4482155,0.2538528-0.8337402,0.7693787-1.1604538  c0.1686096-0.1077919,0.2982788-0.194706,0.3900757-0.2646217c0.2859001-0.2162476,0.4789314-0.4560471,0.58284-0.7154541  c0.1051788-0.2646217,0.1525497-0.6906281,0.1525497-1.2708549v-0.8422432V33.2114296  c0-0.5913353-0.0525894-1.0232315-0.156498-1.2930717c-0.110733-0.2561245-0.298275-0.491375-0.5788918-0.6880188  c-0.0917969-0.0784225-0.2146416-0.159441-0.3766937-0.256794c-0.5236893-0.3345413-0.7827606-0.7233448-0.7827606-1.1741734  v-0.8448524h9.9274635v0.8448524c0,0.4593201-0.2538528,0.8507328-0.7733307,1.1741734  c-0.1620483,0.113678-0.2875061,0.1894855-0.3671951,0.256794c-0.2927246,0.1966438-0.4844818,0.4345036-0.600502,0.7121735  c-0.1159515,0.2731209-0.168541,0.7664337-0.168541,1.4819527v0.6265907v18.5075912h4.8825684  c1.3982544,0,2.3414612-0.1352272,2.8314972-0.4077415c0.4978638-0.2646217,0.8892746-0.7206688,1.1552353-1.3492737  c0.1227798-0.2646217,0.259079-0.6559677,0.4237366-1.1826057c0.3400955-1.1389122,0.8206253-1.7165337,1.445282-1.7165337  h1.0716095V54.8285789L81.0176086,54.8285789z M82.8017197,54.8285789v-0.8448563  c0-0.4482155,0.2603378-0.8337402,0.7664337-1.1604538c0.1796494-0.1077919,0.3038254-0.194706,0.3995819-0.2646217  c0.2887726-0.2162476,0.4792557-0.4560471,0.5818253-0.7154541c0.1065216-0.2646217,0.1483383-0.6906281,0.1483383-1.2708549  v-0.8422432V33.2114296c0-0.5913353-0.0513153-1.0232315-0.1483383-1.2930717  c-0.1176224-0.2620125-0.3038254-0.491375-0.5818253-0.6880188c-0.0957565-0.0784225-0.2199326-0.159441-0.3780365-0.256794  c-0.5246964-0.3345413-0.7879791-0.7233448-0.7879791-1.1741734v-0.8448524h14.974617  c0.9703064,0,1.7250366-0.0457649,2.2578278-0.137228c0.5400772-0.0895233,1.0663834-0.2430782,1.5966339-0.4586582v6.8286648  h-1.0565567c-0.6952438,0-1.2673111-0.5455704-1.6992035-1.6361084c-0.220192-0.534462-0.4129486-0.9226036-0.5749435-1.1846123  c-0.2888412-0.4371128-0.6492081-0.7533875-1.0823746-0.9395943c-0.4358368-0.1862049-1.1228485-0.2750664-2.0647888-0.2750664  h-0.4818726h-3.8531189v9.1606941h1.6452713c0.7746048,0,1.3159637-0.0405464,1.6126251-0.1320076  c0.3051071-0.0921326,0.5426331-0.2430801,0.7167892-0.4593277c0.1267242-0.1483345,0.2577362-0.4286194,0.4237366-0.8174171  c0.3400955-0.7690468,0.7258835-1.1473465,1.1512909-1.1473465h0.9836807v7.2880592h-0.9836807  c-0.4254074,0-0.8180847-0.3940239-1.1512909-1.1637383c-0.1702194-0.4077454-0.3008881-0.6854134-0.4237366-0.8389626  c-0.1809845-0.2300301-0.4211197-0.380909-0.7167892-0.4645424c-0.2966614-0.0836372-0.8380203-0.1294022-1.6126251-0.1294022  h-1.6452713v10.07024h5.2837524c1.4035339,0,2.3603973-0.1352882,2.8531036-0.3992424  c0.504425-0.2757301,0.91082-0.7180595,1.1875534-1.3525505c0.1159515-0.2672386,0.2440186-0.6664734,0.3965759-1.182003  c0.313324-1.1231918,0.8017578-1.6818771,1.4685669-1.6818771h1.0199509v6.9260864H82.8017197L82.8017197,54.8285789z   M113.407402,49.7300949v0.4077339c0,0.8957748,0.0659714,1.4845009,0.1953049,1.7569504  c0.1267853,0.2699089,0.3796387,0.5449715,0.7507782,0.8043747c0.0575409,0.0345917,0.1267929,0.0836334,0.1914215,0.124115  c0.5129852,0.3267136,0.7769394,0.7122383,0.7769394,1.1604538v0.8448563h-9.9356232v-0.8448563  c0-0.4482155,0.2567978-0.8337402,0.7723312-1.1604538c0.1646576-0.1077919,0.292717-0.194706,0.3959579-0.2646217  c0.2842255-0.2162476,0.4756546-0.4560471,0.5788956-0.7154541c0.1045761-0.2646217,0.1535492-0.6906281,0.1535492-1.2708549  v-0.8422432V33.2114296c0-0.5965538-0.0542603-1.0232315-0.1620483-1.2930717  c-0.1039047-0.2620125-0.3012238-0.491375-0.5703964-0.6880188c-0.103241-0.0758057-0.2208633-0.159441-0.3822479-0.256794  c-0.5246964-0.3345413-0.7860413-0.7233448-0.7860413-1.1741734v-0.8448524h12.0617752  c1.4786758,0,2.650238,0.0921326,3.4871902,0.2705116c0.8553543,0.1750984,1.5655899,0.4717693,2.1536484,0.8663883  c0.7990875,0.5475845,1.4302979,1.2819653,1.8948441,2.2372894c0.4724426,0.9421959,0.7017365,1.9458199,0.7017365,2.9958191  c0,2.0595055-0.5965576,3.6544685-1.7811661,4.7750435c-1.1852875,1.1225929-2.8802032,1.6786003-5.0827637,1.6786003  c-0.0483704,0-0.1594391,0-0.3129883-0.0130463c-0.1620636-0.0137177-0.2783432-0.0215454-0.3587723-0.0215454  c1.8432617,0.3475914,3.2761688,1.4622841,4.2889633,3.3493004c0.062088,0.1051788,0.1077881,0.1835938,0.134613,0.2293587  l2.7906799,5.1768951c0.3267136,0.6128807,0.618103,1.0716095,0.8611832,1.3956451  c0.2430725,0.3208275,0.4834747,0.5449715,0.7128372,0.663868c0.1431198,0.0758057,0.3534775,0.1672707,0.6286087,0.2836189  c0.6533585,0.2802849,0.9852829,0.6422577,0.9852829,1.1062012v0.8801117h-7.5225677l-6.4092178-11.9892387h-1.2127075V49.7300949  L113.407402,49.7300949z M113.2623444,31.3329105v9.3011951c0.0921326,0.010437,0.2110291,0.0241508,0.3403625,0.0293732  c0.1365662,0.0052185,0.3091125,0.0052185,0.5345306,0.0052185c1.8164291,0,3.1592102-0.3802376,4.0203857-1.1578484  c0.8637848-0.7768784,1.3008957-1.9725914,1.3008957-3.5975952c0-1.4309692-0.3914108-2.558712-1.1689529-3.3957367  c-0.7742615-0.8422375-1.8379745-1.2578049-3.1872482-1.2578049c-0.4646072,0-0.8233032,0.0084972-1.0853195,0.0215454  C113.7484283,31.2950401,113.5093002,31.3113651,113.2623444,31.3329105L113.2623444,31.3329105z M129.7692261,54.8285789  v-0.8448563c0-0.4482155,0.256134-0.8337402,0.7664337-1.1604538c0.1698914-0.1077919,0.2998962-0.194706,0.3939667-0.2646217  c0.2888336-0.2162476,0.4809418-0.4560471,0.5861206-0.7154541c0.0992889-0.2646217,0.1509399-0.6906281,0.1509399-1.2708549  v-0.8422432V33.2114296c0-0.5913353-0.051651-1.0232315-0.1672668-1.2930717  c-0.0973511-0.2620125-0.2887878-0.491375-0.5697937-0.6880188c-0.0940704-0.0758057-0.2181854-0.159441-0.3750305-0.256794  c-0.5292358-0.3345413-0.7853699-0.7233448-0.7853699-1.1741734v-0.8448524H144.74646  c0.9611359,0,1.7112579-0.0457649,2.2483978-0.137228c0.5429535-0.0895233,1.0715332-0.2430782,1.6008453-0.4586582v6.8286648  h-1.0578918c-0.6912994,0-1.2636871-0.5455704-1.7034149-1.6361084c-0.2156525-0.534462-0.4025269-0.9310951-0.572403-1.1846123  c-0.2887726-0.4371128-0.6474762-0.7533875-1.0741425-0.9395943c-0.4397888-0.1862049-1.1225891-0.2750664-2.0700073-0.2750664  h-0.4808807h-3.8485718v9.1606941h1.6380615c0.7802124,0,1.3199005-0.0405464,1.6197815-0.1320076  c0.2914581-0.0921326,0.5319214-0.2430801,0.7148438-0.4593277c0.1188965-0.1483345,0.2541809-0.4312248,0.4266815-0.8174171  c0.3241119-0.7690468,0.7180634-1.1473465,1.1447296-1.1473465h0.9794769v7.2880592h-0.9794769  c-0.4266663,0-0.8206177-0.3940239-1.1447296-1.1637383c-0.1725006-0.4077454-0.307785-0.6854134-0.4266815-0.8389626  c-0.1829224-0.2300301-0.4233856-0.380909-0.7148438-0.4645424c-0.3050995-0.0836372-0.8395691-0.1294022-1.6197815-0.1294022  h-1.6380615v10.07024h5.2768707c1.4061432,0,2.3666077-0.1352882,2.8605957-0.3992424  c0.4998779-0.2757301,0.9069519-0.7180595,1.1852875-1.3525505c0.1130066-0.2672386,0.2404633-0.6723633,0.3887939-1.182003  c0.3129272-1.1146927,0.7958069-1.6818771,1.4707794-1.6818771h1.0173492v6.9260864H129.7692261L129.7692261,54.8285789z   M161.0331573,42.6256332l-5.4552307-9.0555077c-0.5396881-0.8879433-0.8984528-1.4733887-1.1147003-1.7491245  c-0.213028-0.2672253-0.4103394-0.4344978-0.6096649-0.5207424c-0.1293335-0.0594807-0.3155365-0.137228-0.5481873-0.2319775  c-0.7553253-0.3188782-1.1277313-0.7474937-1.1277313-1.2689095v-0.8448524h10.696167v0.8448524  c0,0.5103092-0.2861633,0.8507328-0.8448486,1.0180035c-0.5612946,0.1646671-0.8553009,0.3208313-0.8553009,0.4828835  c0,0.2861671,0.2103729,0.7507133,0.6128845,1.3930321c0.0561981,0.0999603,0.0993042,0.1777077,0.1372375,0.2371902  l2.8070068,4.7587204l3.2957611-4.6724739c0.2025299-0.2940636,0.3809052-0.5639038,0.4965973-0.8285294  c0.1077881-0.2587337,0.1698761-0.4828758,0.1698761-0.6749763c0-0.1424408-0.3155975-0.3260384-0.9363861-0.5422859  c-0.6180878-0.2215328-0.9284058-0.61549-0.9284058-1.1715641v-0.8448524h7.5898743v0.8448524  c0,0.4835453-0.3586884,0.855957-1.0637054,1.1205807c-0.2450867,0.0966816-0.4397888,0.1777077-0.58284,0.2319641  c-0.2888489,0.1215134-0.5880585,0.3456554-0.9017181,0.6690845c-0.318222,0.3188229-0.6664886,0.7671108-1.0552216,1.3231182  l-4.7208557,6.7581444l6.2648315,10.3433609c0.421463,0.7017326,0.769043,1.2224808,1.0447845,1.5439758  c0.2835541,0.3319321,0.556076,0.5691223,0.8121948,0.6932373c0.0862427,0.0431557,0.2025299,0.0758095,0.3456421,0.1241837  c0.6585846,0.2482948,0.9853058,0.712841,0.9853058,1.3767014v0.8448563h-11.0960846v-0.8448563  c0-0.6396446,0.3293152-1.0794296,0.9957886-1.322506c0.6723633-0.2430115,1.004303-0.4860916,1.004303-0.7317772  c0-0.1672707-0.1672821-0.5233574-0.5024872-1.0768242c-0.1077881-0.1620522-0.1888123-0.3018875-0.2646179-0.4318924  l-3.3277588-5.5624237l-3.8086853,5.427803c-0.2672272,0.3777008-0.4586639,0.6716957-0.5612946,0.869072  c-0.0940704,0.2077484-0.1371613,0.4018517-0.1371613,0.5965576c0,0.3456459,0.2966003,0.6448631,0.8983765,0.9042664  c0.5965576,0.2535133,0.8906097,0.7018013,0.8906097,1.3277245v0.8448563h-7.7003479v-0.8448563  c0-0.3914146,0.0888672-0.6991234,0.2587433-0.9284821c0.1646576-0.2240791,0.4998627-0.439724,0.99646-0.6449318  c0.9284973-0.380909,1.7569427-1.0957565,2.4855194-2.1431389c0.1620483-0.2319717,0.2888336-0.4103546,0.3809052-0.537075  L161.0331573,42.6256332L161.0331573,42.6256332z"/>
            </svg>
            </a>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-1">
                @yield('content')
            </div>
        </div>

        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="flex items-center">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                        <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>

                    <span class="ml-1">
                        See rakendus jookseb Laravel {{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) peal.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
