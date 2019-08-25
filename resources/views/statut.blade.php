@extends('layouts.master')

@section('content')

    <div id="banner-area">
        <img src="{{asset('banner/banner2.jpg')}}" alt=""/>
        <div class="parallax-overlay"></div>
        <div class="banner-title-content">
            <div class="text-center">
                <h2>Statut</h2>
                <ul class="breadcrumb">
                    <li>Qui sommes nous?</li>
                    <li>Statut</li>
                </ul>
            </div>
        </div>
    </div>
    <section id="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading">
                    <h4 class="title-border">Statut de l'association –Moroccan Institute of Technology- MITech</h4>
                </div>
            </div>

            <div class="row">
                Il est formé entre les adhérents aux présents statuts une association à but non lucratif qui sera régie
                par les dispositions du dahir n° 1.58.367 du 15 novembre 1958 tel qu’il a été modifié par le Dahir
                portant loi n° 1-73-283 du 6 Rabiaa I 1393 correspondant au 10 avril 1973 et . Les présents statuts ont
                été adoptés par l’Assemblée Générale en date du 02 mars 2018.
            </div>

            <div class="row">
                <div class="landing-tab clearfix">
                    <ul class="nav nav-tabs nav-stacked col-md-3 col-sm-5">
                        <li class="active">
                            <a class="animated fadeIn" href="#tab_a" data-toggle="tab">
                                <span class="tab-icon"><i class="fa fa-university"></i></span>
                                <div class="tab-info">
                                    <h5>I: OBJET-DENOMINATION-SIEGE ET DUREE</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="animated fadeIn" href="#tab_b" data-toggle="tab">
                                <span class="tab-icon"><i class="fa fa-user"></i></span>
                                <div class="tab-info">
                                    <h5>II: ADMISSION – EXCLUSION DES ADHÉRENTS</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="animated fadeIn" href="#tab_c" data-toggle="tab">
                                <span class="tab-icon"><i class="fa fa-file"></i></span>
                                <div class="tab-info">
                                    <h5>III: RESSOURCES – DOCUMENTS COMPTABLES</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="animated fadeIn" href="#tab_d" data-toggle="tab">
                                <span class="tab-icon"><i class="fa fa-sitemap"></i></span>
                                <div class="tab-info">
                                    <h5>IV: ORGANISATION</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="animated fadeIn" href="#tab_e" data-toggle="tab">
                                <span class="tab-icon"><i class="fa fa-exclamation-circle"></i></span>
                                <div class="tab-info">
                                    <h5>V: DISSOLUTION – LIQUIDATION</h5>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content col-md-9 col-sm-7">

                        <div class="tab-pane active animated fadeInRight" id="tab_a">
                            <i class="fa fa-university big"></i>
                            <h3>ARTICLE 1 : DENOMINATION</h3>
                            <p>L’association prend la dénomination : <b>Moroccan Institute of Technology</b>, par
                                abréviation <b>«MITech»</b></p>

                            <h3>ARTICLE 2 : OBJET</h3>
                            <p>MITech réunit des partenaires impliqués dans la formation, le conseil, l’exploitation, la
                                recherche et le développement en technologies. Son rôle est d’améliorer la compétitivité
                                des membres en favorisant l’acquisition de nouvelles compétences, en encourageant le
                                transfert de connaissances et de technologies entre milieux académiques et économiques
                                et en enrichissant l’enseignement dans les filières de formation.</p>
                            <br/>
                            <p>MITech a pour mission de :</p>
                            <ul>
                                <li>favoriser la maîtrise de nouvelles technologies et les connaissances connexes.</li>
                                <li>faciliter au transfert de connaissances et de technologies entre hautes écoles et
                                    milieux économiques.
                                </li>
                                <li>contribuer aux activités de recherche et développement du domaine.</li>
                                <li>enrichir l’enseignement dans les filières de formation du domaine.</li>
                                <li>développer les échanges inter-entrepris.</li>
                                <li>se positionner comme interlocuteur de choix entre les différents acteurs et
                                    participer au renforcement de l’arsenal juridique et réglementaire lié aux
                                    différents domaines technologiques.
                                </li>
                                <li>échanger les expériences et l’information d’ordre technique, scientifique et
                                    culturel et ce par l’organisation de rencontres, séminaires et conférences ou
                                    autres.
                                </li>
                                <li>créer et entretenir des rapports de bonne fraternité entre ses membres et le
                                    renforcement des liens avec d’autres associations similaires au Maroc et à
                                    l’étranger.
                                </li>
                                <li>sensibiliser, accompagner et aider à l’orientation.</li>
                                <li>créer des structures favorisant l’innovation et la maîtrise technologique.</li>
                            </ul>

                            <h3>ARTICLE 3 : SIEGE</h3>
                            <p>Le siège social de l’association est fixé à <strong>N° 20, Avenue Allal El Fassi
                                    Résidence Majorelle, 40000 Marrakech</strong>. Il pourra être transféré en tout
                                endroit de la même ville par simple décision du Bureau et partout ailleurs au Maroc par
                                décision de l’Assemblée générale.</p>

                            <h3>ARTICLE 4 : DUREE</h3>
                            <p>L’association est créée pour une durée illimitée.</p>
                        </div>

                        <div class="tab-pane animated fadeInLeft" id="tab_b">
                            <i class="fa fa-user big"></i>
                            <h3>ARTICLE 5 : ADMISSION</h3>
                            <p>L’Association se compose d’adhérents titulaires et d’adhérents honoraires. Les adhérents
                                titulaires sont des Personnes Physiques, des Administrations, des Sociétés ou des
                                Organismes. Les personnes morales seront représentées par des délégués dûment mandatés.
                                Les adhérents honoraires sont nommés par l’assemblée générale sur proposition du Bureau.
                                Pour devenir adhérent titulaire de l’association, il faut satisfaire aux conditions
                                suivantes :</p>
                            <ul>
                                <li>Adresser au bureau de l’Association une demande écrite.</li>
                                <li>Être agréé par le Bureau de l’Association.</li>
                                <li>Payer la cotisation annuelle.</li>
                            </ul>
                            <p>L’adhésion peut se faire à tout moment de l’année. Dans ce cas, la cotisation de l’année
                                d’adhésion est calculée pour la catégorie d’adhérent proportionnellement au nombre de
                                mois
                                complets restants suivant la date de signature.</p>

                            <h3>ARTICLE 6 : EXCLUSION DES ADHÉRENTS</h3>
                            <p>La qualité d’adhérent se perd suite :</p>
                            <ul>
                                <li>A la dissolution de la personne morale adhérente ou le décès de la personne physique
                                    adhérente.
                                </li>
                                <li>Au retrait de la personne portée à la connaissance du Bureau par lettre adressée au
                                    président de l’association.
                                </li>
                                <li>A la radiation prononcée par le Bureau en raison de non-paiement de cotisations
                                    durant
                                    deux années successives ou d’une infraction volontaire aux dispositions statutaires
                                    ou
                                    réglementaires régissant l’association.
                                </li>
                            </ul>
                            <p>La décision de radiation d’un membre du Bureau devra être ratifiée par la prochaine
                                Assemblée
                                Générale. Le membre concerné sera prévenu par lettre recommandée de la décision qui a
                                été
                                prise dans les 15 jours qui suivent. La radiation ne donne lieu à aucun remboursement de
                                cotisation</p>
                        </div>

                        <div class="tab-pane animated fadeIn" id="tab_c">
                            <i class="fa fa-file big"></i>

                            <h3>ARTICLE 7 : RESSOURCES DE L’ASSOCIATION</h3>
                            <p>Les ressources de l’association se composent :</p>
                            <ul>
                                <li>des cotisations des membres.</li>
                                <li>des contributions de soutien volontaires.</li>
                                <li>des bénéfices des manifestations organisées.</li>
                                <li>des revenus du patrimoine de l’association.</li>
                                <li>du sponsoring.</li>
                                <li>de toute autre ressource autorisée par la loi.</li>
                            </ul>
                        </div>

                        <div class="tab-pane animated fadeIn" id="tab_d">
                            <i class="fa fa-sitemap big"></i>

                            <h3>ARTICLE 8 :L’ASSEMBLÉE GÉNÉRALE</h3>
                            <ul>
                                <li>L’Assemblée Générale se compose de tous les adhérents titulaires ayant acquitté leur
                                    cotisation de l’année en cours et des adhérents honoraires.
                                </li>
                                <li>Les convocations sont faites par simples lettres missives, par messagerie
                                    électronique ou en cas de besoin par annonce légale dans les journaux.
                                </li>
                                <li>Les Assemblées Générales seront tenues au siège de l’Association ou en tout endroit
                                    fixé par la convocation.
                                </li>
                                <li>Les avis et lettres de convocations doivent mentionner l’ordre du jour.</li>
                                <li>Nul ne peut représenter un adhérent de l’Association s’il n’est pas lui-même
                                    adhérent.
                                </li>
                                <li>Un adhérent ne peut représenter plus qu’un autre adhérent de l’association sur
                                    présentation d’une procuration légalisée.
                                </li>
                                <li>Les Assemblées Générales sont présidées par le Président du Bureau, ou son
                                    remplaçant, assisté du Secrétaire Général ou son remplaçant en cas d’empêchement.
                                </li>
                            </ul>

                            <h3>ARTICLE 9 : L’ASSEMBLÉE GÉNÉRALE ORDINAIRE ANNUELLE</h3>
                            <ul>
                                <li>Est convoquée par le Président du Bureau ou par le tiers des adhérents titulaires.
                                </li>
                                <li>Cette Assemblée Générale ne peut être considérée comme valide que si, au moins, 50%
                                    des adhérents y sont présents ou représentés. Au cas où ce quorum ne serait pas
                                    atteint, le Président devra procéder à une convocation pour une autre Assemblée
                                    Générale ordinaire dans un délai n’excédant pas quinze jours. Cette Assemblée
                                    Générale ordinaire sera considérée comme valide si au moins 30% des adhérents y sont
                                    présents ou représentés.
                                </li>
                                <li>Reçoit le rapport moral et financier.</li>
                                <li>Lors des délibérations de l’Assemblée Générale ordinaire, les résolutions sont
                                    prises à la majorité des voix des adhérents présents ou représentant obligatoirement
                                    au moins un tiers des adhérents ayant acquitté régulièrement le montant de leurs
                                    cotisations.
                                </li>
                                <li>Chaque organisme adhérent compte pour une voix.</li>
                                <li>En cas de partage égal des voix, la voix du Président est prépondérante.</li>
                                <li>Si le quorum de la tenue de l’Assemblée Générale n’est pas atteint, elle est
                                    convoquée à nouveau selon les formes prescrites ci-dessus. Dans cette seconde
                                    réunion de l’Assemblée Générale, les délibérations sont valables quel que soit le
                                    nombre des membres adhérents présents ou représentés, mais elles ne peuvent porter
                                    que sur les questions mises à l’ordre du jour de la dernière réunion.
                                </li>
                            </ul>

                            <h3>ARTICLE 10 : L’ASSEMBLÉE GÉNÉRALE EXTRAORDINAIRE</h3>
                            <p>En cas de nécessité, une Assemblée Générale Extraordinaire peut être convoquée par le
                                Président ou par au moins le tiers des adhérents ayant acquitté régulièrement le montant
                                de leurs cotisations. Cette Assemblée Générale Extraordinaire ne peut être considérée
                                comme valide que si, au moins, 50% des adhérents y sont présents ou représentés. Au cas
                                où ce quorum ne serait pas atteint, le Présidents devra procéder à une convocation pour
                                une autre Assemblée Générale Extraordinaire dans un délai n’excédant pas quinze jours.
                                Cette Assemblée Générale Extraordinaire sera considérée comme valide si au moins 30% des
                                adhérents y sont présents ou représentés.</p>
                            <p>L’Assemblée Générale Extraordinaire peut modifier dans toutes leurs dispositions les
                                statuts, ainsi que tout règlement intérieur, sous réserve du respect des dispositions
                                légales résultant du Dahir cité dans le préambule du présent statut, précité. Toutes les
                                modifications statutaires, décidées par l’Assemblée Générale Extraordinaire, devront
                                obligatoirement faire l’objet d’une déclaration déposée régulièrement, conformément à
                                l’article 5 du dit Dahir.</p>
                            <p>L’Assemblée Générale Extraordinaire peut notamment :</p>
                            <ul>
                                <li>Ordonner la dissolution de l’Association, sa fusion avec toutes autres associations,
                                    ou son affectation à toutes autres unions ou Fédérations d’Associations.
                                </li>
                                <li>Transférer le siège de l’Association en dehors de la ville où il se trouve.</li>
                                <li>Réduire ou accroître le nombre des membres du Bureau.</li>
                                <li>Modifier le mode et les délais de convocation des Assemblées Générales.</li>
                                <li>Dans toutes les Assemblées Générales Extraordinaires, qu’elles soient réunies sur
                                    première convocation ou sur convocations subséquentes, les résolutions, pour être
                                    valablement prises, doivent réunir au moins les deux tiers des voix des adhérents
                                    présents ou représentés. Chaque Organisme adhérent compte pour une voix.
                                </li>
                            </ul>
                            <p>Les délibérations des assemblées réunies sur convocations subséquentes ne peuvent porter
                                que sur les questions figurant à l’ordre du jour de la première assemblée.</p>

                            <h3>ARTICLE 12 – LE BUREAU EXÉCUTIF</h3>
                            <p>L’association est dirigée par le Bureau constitué des membres élus, pour une période de
                                deux années, par l’assemblée générale. Les membres sont rééligibles et leurs fonctions
                                ne sont pas rémunérées, sauf pour ce qui est de leurs frais de déplacement qui peuvent
                                être pris en charge par l’association. Le bureau se compose des membres suivants :</p>
                            <ul>
                                <li>Le Président&nbsp;;</li>
                                <li>Deux Vice-président&nbsp;;</li>
                                <li>Un Secrétaire Générale&nbsp;;</li>
                                <li>Un Secrétaire Générale Adjoint&nbsp;;</li>
                                <li>Un Trésorier&nbsp;;</li>
                                <li>Un Trésorier adjoint&nbsp;;</li>
                                <li>Des Assesseurs.</li>
                            </ul>

                            <h3>ARTICLE 13 – RÉUNIONS DU BUREAU</h3>
                            <ul>
                                <li>Le Bureau se réunit dans les conditions convenues au cours de sa précédente réunion
                                    ou sur convocation du président, à l’initiative de celui-ci ou sur demande écrite,
                                    adressée à celui-ci par, au moins le tiers de ses membres et aussi souvent que
                                    l’intérêt de l’Association l’exige.
                                </li>
                                <li>Le Bureau se doit de se réunir au moins une fois par trimestre.</li>
                                <li>Les décisions sont prises à la majorité simple des voix, en cas de partage égal, la
                                    voix du Président est prépondérante.
                                </li>
                            </ul>

                            <h3>ARTICLE 14 – REGLEMENT INTERIEUR</h3>
                            <p>Un règlement intérieur peut être établi par le Bureau Exécutif qui le fait alors approuvé
                                par l’assemblée générale. Ce règlement éventuel est destiné à fixer les divers points
                                non prévus par les présents statuts, notamment ceux qui ont trait à l’administration
                                interne de l’association. Le bureau se charge aussi d’établir tout éventuel amendement à
                                ce règlement intérieur.</p>
                        </div>

                        <div class="tab-pane animated fadeIn" id="tab_e">
                            <i class="fa fa-exclamation-circle big"></i>
                            <h3>ARTICLE 15 : DISSOLUTION ANTICIPÉE</h3>
                            <p>3>A toutes époques, l’assemblée générale extraordinaire constituée, comme décrit
                                ci-dessus, sur la proposition du Bureau ou de son Président, peut prononcer la
                                dissolution anticipée de l’Association.</p>

                            <h3>ARTICLE 16 : LIQUIDATION</h3>
                            <p>En cas de dissolution pour quelque motif que ce soit, le Président de l’Association
                                deviendra de plein droit liquidateur, à moins que l’Assemblée Générale n’en décide
                                autrement.</p>
                            <p>Le liquidateur devra affecter l’actif net à la création ou à la subvention d’une œuvre
                                similaire ayant la capacité légale de recevoir cet actif net, conformément aux
                                dispositions de l’article 37 du Dahir n° 1-58-376 du 15 novembre 1958.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection