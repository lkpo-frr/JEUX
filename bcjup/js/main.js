// ==================== DONNÉES CORRESPONDANT À VOS TABLES SQL ====================
// Ces données simulent ce que PHP enverrait depuis votre BDD

// Table 'jeu'
const gamesData = [
    {
        numJeu: 4572,
        name: "FINAL FANTASY IV",
        description: "Un RPG culte de Square, révolutionnaire avec son système ATB. Version originale SNES de 1991.",
        platforms: ["SNES", "Playstation", "WonderSwan Color", "GBA", "PSP"],
        rating: 8.5,
        versionsCount: 4,
        dateSortie: "1991-07-19",
        genre: "JRPG",
        developpeur: "Square"
    },
    {
        numJeu: 858,
        name: "FINAL FANTASY VII",
        description: "Un RPG culte de Square Enix, révolutionnaire par ses graphismes 3D et son scénario émouvant.",
        platforms: ["Playstation", "PC", "Playstation 4", "Playstation 5"],
        rating: 9.2,
        versionsCount: 3,
        dateSortie: "1997-01-31",
        genre: "JRPG",
        developpeur: "Square Enix"
    },
    {
        numJeu: 3549,
        name: "THE LEGEND OF ZELDA OOT",
        description: "L'aventure 3D de Nintendo qui a redéfini le genre action-aventure.",
        platforms: ["Nintendo 64", "3DS", "PC"],
        rating: 9.9,
        versionsCount: 3,
        dateSortie: "1998-12-21",
        genre: "Aventure",
        developpeur: "Nintendo"
    },
    {
        numJeu: 52872,
        name: "RESIDENT EVIL 4",
        description: "Un TPS légendaire qui a révolutionné le survival-horror.",
        platforms: ["GameCube", "Playstation 2", "PC", "Playstation 4", "Playstation 5"],
        rating: 9.3,
        versionsCount: 2,
        dateSortie: "2005-01-11",
        genre: "TPS",
        developpeur: "Capcom"
    }
];

// Table 'version' pour FFIV (numJeu: 4572)
const ffivVersions = [
    { numVersion: 20, name: "Final Fantasy II (Original)", year: 1991, type: "Original", rating: 8.5, original: true, description: "Version originale SNES japonaise" },
    { numVersion: 21, name: "Remake 3D", year: 2007, type: "Remake", rating: 8.0, original: false, description: "Jeu entièrement refait en 3D" },
    { numVersion: 22, name: "Pixel Remaster", year: 2021, type: "Remaster", rating: 8.8, original: false, description: "Jeu en 2D avec sprites refaits" }
];

// Table 'version' pour FFVII (numJeu: 858)
const ffviiVersions = [
    { numVersion: 30, name: "Original", year: 1997, type: "Original", rating: 9.5, original: true, description: "Version originale PlayStation" },
    { numVersion: 31, name: "Remake (Intergrade)", year: 2020, type: "Remake", rating: 8.9, original: false, description: "1er jeu de la trilogie des remakes" },
    { numVersion: 32, name: "Rebirth", year: 2024, type: "Remake", rating: 9.0, original: false, description: "2ème jeu de la trilogie des remakes" }
];

// Table 'version' pour Zelda OOT (numJeu: 3549)
const zeldaVersions = [
    { numVersion: 1, name: "Original", year: 1998, type: "Original", rating: 9.9, original: true, description: "Version originale Nintendo 64" },
    { numVersion: 2, name: "Remake 3D", year: 2011, type: "Remake", rating: 9.5, original: false, description: "Version 3D stéréoscopique" },
    { numVersion: 3, name: "Ship of Harkinian", year: 2022, type: "Portage", rating: 9.3, original: false, description: "Portage PC fanmade" }
];

// Table 'version' pour RE4 (numJeu: 52872)
const re4Versions = [
    { numVersion: 10, name: "Original", year: 2005, type: "Original", rating: 9.5, original: true, description: "Version originale GameCube" },
    { numVersion: 11, name: "Remake", year: 2023, type: "Remake", rating: 9.3, original: false, description: "Remake avec jeu entièrement refait" }
];

// Table 'portage' pour FFIV (numJeu: 4572) avec jointure plateforme
const ffivPortages = [
    { plateforme: "SNES", resolution: "256x224", framerate: 60, stable: true, lagSup: false, dateSortie: "1991-07-19", original: true, note: 8 },
    { plateforme: "Playstation", resolution: "256x224", framerate: 60, stable: true, lagSup: true, dateSortie: "1997-03-21", original: false, note: 7 },
    { plateforme: "WonderSwan Color", resolution: "224x144", framerate: 60, stable: true, lagSup: false, dateSortie: "2002-03-28", original: false, note: 6 },
    { plateforme: "GBA", resolution: "240x160", framerate: 60, stable: true, lagSup: false, dateSortie: "2005-12-12", original: false, note: 8 },
    { plateforme: "PSP", resolution: "480x272", framerate: 60, stable: true, lagSup: false, dateSortie: "2011-03-24", original: false, note: 9 }
];

// Table 'localisation' pour FFIV
const ffivLocalisations = [
    { numLocalisation: 1, region: "Japon", dateSortie: "1991-07-19", original: true, modifContenu: false, description: "Version originale japonaise" },
    { numLocalisation: 2, region: "USA", dateSortie: "1991-11-23", original: false, modifContenu: true, description: "Version censurée américaine" },
    { numLocalisation: 5, region: "Europe", dateSortie: "2002-05-01", original: false, modifContenu: true, description: "Version PAL" }
];

// Table 'changeLocale' (censures et modifications par localisation)
const ffivChangeLocale = [
    { type: "Censure", description: "Dancers habillés (au lieu de bikinis)", important: true, region: "USA" },
    { type: "Censure", description: "Pas de baiser entre Cecil et Rosa", important: true, region: "USA" },
    { type: "Censure", description: "Suppression des gros mots", important: false, region: "USA" },
    { type: "Censure", description: "Salle des programmeurs supprimée", important: false, region: "USA" },
    { type: "Gameplay", description: "La difficulté du jeu a été réduite", important: true, region: "USA" },
    { type: "Traduction", description: "You spoony bard! - Célèbre erreur de traduction", important: true, region: "USA" },
    { type: "Traduction", description: "La traduction a été réécrite pour être plus fidèle à l'original", important: true, region: "Europe" }
];

// Table 'changeVersion' pour FFIV
const ffivChangeVersion = [
    { type: "Graphismes", description: "Le jeu a été entièrement refait avec Unity", important: true, version: "Pixel Remaster" },
    { type: "Graphismes", description: "Les sprites des personnages et ennemis ont été refaits", important: true, version: "Pixel Remaster" },
    { type: "Gameplay", description: "Le jeu est globalement plus facile que l'original", important: true, version: "Remake 3D" },
    { type: "Gameplay", description: "Il est possible de courir et de se déplacer dans 8 directions", important: true, version: "Pixel Remaster" },
    { type: "Gameplay", description: "Le jeu est nettement plus difficile que la version originale", important: true, version: "Remake 3D" }
];

// Table 'changePortage' pour FFIV
const ffivChangePortage = [
    { type: "Gameplay", description: "Les temps de chargement ont été augmentés", important: true, plateforme: "Playstation" },
    { type: "Contenu additionnel", description: "Une cinématique FMV a été ajoutée", important: true, plateforme: "Playstation" },
    { type: "Contenu additionnel", description: "2 donjons optionnels ont été ajoutés", important: true, plateforme: "PSP" },
    { type: "Contenu additionnel", description: "Ajout d'un bestiaire", important: false, plateforme: "GBA" },
    { type: "Contenu additionnel", description: "Music player débloquable", important: false, plateforme: "PSP" }
];

// Scores par catégorie pour chaque version
const versionScores = {
    // FFIV - Original (numVersion: 20)
    '20': { graphics: 70, audio: 85, performance: 90, gameplay: 85, story: 80 },
    // FFIV - Remake 3D (numVersion: 21)
    '21': { graphics: 85, audio: 88, performance: 80, gameplay: 75, story: 78 },
    // FFIV - Pixel Remaster (numVersion: 22)
    '22': { graphics: 88, audio: 92, performance: 95, gameplay: 85, story: 82 }
};

// ==================== EASTER EGG "You spoony bard!" ====================
let easterEggCount = 0;
const easterEggTrigger = document.getElementById('easterEggTrigger');
const easterToast = document.getElementById('easterEggToast');

if (easterEggTrigger) {
    easterEggTrigger.addEventListener('click', () => {
        easterEggCount++;
        if (easterEggCount === 3) {
            easterToast.classList.add('show');
            setTimeout(() => {
                easterToast.classList.remove('show');
            }, 3000);
            easterEggCount = 0;
        }
    });
}

// ==================== MOBILE MENU ====================
const mobileBtn = document.querySelector('.mobile-menu-btn');
const navLinks = document.querySelector('.nav-links');

if (mobileBtn) {
    mobileBtn.addEventListener('click', () => {
        navLinks.classList.toggle('show');
    });
}

// ==================== ANIMATED COUNTERS ====================
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number, .stat-num');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        if (isNaN(target)) return;
        
        let current = 0;
        const increment = target / 50;
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        updateCounter();
    });
}

// ==================== GENERATE GAMES GRID ====================
function generateGamesGrid() {
    const grid = document.getElementById('gamesGrid');
    if (!grid) return;
    
    grid.innerHTML = gamesData.map(game => `
        <div class="game-card" onclick="window.location.href='jeu-detail.html?id=${game.numJeu}'">
            <div class="game-card-image">
                <i class="fas fa-gamepad"></i>
            </div>
            <div class="game-card-content">
                <h3>${game.name}</h3>
                <p>${game.description.substring(0, 80)}...</p>
                <div class="game-platforms">
                    ${game.platforms.map(p => `<span>${p}</span>`).join('')}
                </div>
                <div class="game-footer">
                    <span class="game-rating">⭐ ${game.rating}/10</span>
                    <span class="game-versions">📦 ${game.versionsCount} versions</span>
                    <button class="btn-detail">Voir détails</button>
                </div>
            </div>
        </div>
    `).join('');
}

// ==================== RÉCUPÉRATION ID JEU DEPUIS URL ====================
function getJeuIdFromURL() {
    const params = new URLSearchParams(window.location.search);
    return params.get('id');
}

// ==================== GÉNÉRATION DU DÉTAIL DU JEU ====================
function generateGameDetail(jeuId) {
    const jeu = gamesData.find(g => g.numJeu == jeuId);
    if (!jeu) return;
    
    // Mettre à jour le titre de la page
    document.title = `GameVersus - ${jeu.name} - Détail du jeu`;
    
    // Mettre à jour l'en-tête
    const jeuInfo = document.querySelector('.jeu-info');
    if (jeuInfo) {
        jeuInfo.querySelector('h1').textContent = jeu.name;
        jeuInfo.querySelector('.jeu-description').textContent = jeu.description;
        
        // Métadonnées
        const badges = jeuInfo.querySelectorAll('.badge');
        if (badges.length >= 3) {
            badges[0].innerHTML = `<i class="fas fa-calendar"></i> ${new Date(jeu.dateSortie).getFullYear()}`;
            badges[1].innerHTML = `<i class="fas fa-tag"></i> ${jeu.genre}`;
            badges[2].innerHTML = `<i class="fas fa-building"></i> ${jeu.developpeur}`;
        }
        
        // Stats
        const stats = jeuInfo.querySelectorAll('.jeu-stats .stat');
        if (stats.length >= 3) {
            stats[0].querySelector('.value').textContent = `${jeu.rating}/10`;
            stats[1].querySelector('.value').textContent = jeu.versionsCount;
            stats[2].querySelector('.value').textContent = jeu.platforms.length;
        }
        
        // Plateformes
        const plateformesContainer = jeuInfo.querySelector('.plateformes');
        if (plateformesContainer) {
            plateformesContainer.innerHTML = jeu.platforms.map(p => `<span class="plateforme"><i class="fas fa-gamepad"></i> ${p}</span>`).join('');
        }
    }
    
    // Générer le classement des versions (depuis table 'version')
    generateVersionRanking(jeuId);
    
    // Générer les scores (depuis table 'version' avec scores)
    generateScores(jeuId);
    
    // Générer les points forts/faibles
    generateStrengthsWeaknesses(jeuId);
    
    // Générer les changements (depuis tables 'changeVersion', 'changePortage', 'changeLocale')
    generateChanges(jeuId);
    
    // Générer le tableau des portages (depuis table 'portage' + 'plateforme')
    generatePortageTable(jeuId);
    
    // Générer la timeline
    generateTimeline(jeuId);
}

// ==================== CLASSEMENT DES VERSIONS (table 'version') ====================
function generateVersionRanking(jeuId) {
    let versions = [];
    if (jeuId == 4572) versions = ffivVersions;
    else if (jeuId == 858) versions = ffviiVersions;
    else if (jeuId == 3549) versions = zeldaVersions;
    else if (jeuId == 52872) versions = re4Versions;
    
    const rankingContainer = document.querySelector('.ranking-list');
    if (rankingContainer) {
        rankingContainer.innerHTML = versions.map((v, index) => `
            <div class="ranking-item ${index === 0 ? 'first' : ''}">
                <div class="rank">${index + 1}</div>
                <div class="version-info">
                    <h3>${v.name}</h3>
                    <span class="year">${v.year}</span>
                    ${v.original ? '<span class="tag-original">Original</span>' : ''}
                    <span class="version-type">${v.type}</span>
                </div>
                <div class="rating">${v.rating} <i class="fas fa-star"></i></div>
            </div>
        `).join('');
    }
}

// ==================== SCORES PAR CATÉGORIE (table 'version') ====================
function generateScores(jeuId) {
    let scores = null;
    if (jeuId == 4572) scores = versionScores['20'];
    
    const scoresContainer = document.querySelector('.scores-list');
    if (scoresContainer && scores) {
        scoresContainer.innerHTML = `
            <div class="score-item">
                <span>Graphismes</span>
                <div class="progress-bar"><div class="progress" style="width: ${scores.graphics}%"></div></div>
                <span class="score-value">${scores.graphics/10}/10</span>
            </div>
            <div class="score-item">
                <span>Audio</span>
                <div class="progress-bar"><div class="progress" style="width: ${scores.audio}%"></div></div>
                <span class="score-value">${scores.audio/10}/10</span>
            </div>
            <div class="score-item">
                <span>Performance</span>
                <div class="progress-bar"><div class="progress" style="width: ${scores.performance}%"></div></div>
                <span class="score-value">${scores.performance/10}/10</span>
            </div>
            <div class="score-item">
                <span>Gameplay</span>
                <div class="progress-bar"><div class="progress" style="width: ${scores.gameplay}%"></div></div>
                <span class="score-value">${scores.gameplay/10}/10</span>
            </div>
            <div class="score-item">
                <span>Histoire</span>
                <div class="progress-bar"><div class="progress" style="width: ${scores.story}%"></div></div>
                <span class="score-value">${scores.story/10}/10</span>
            </div>
        `;
    }
}

// ==================== POINTS FORTS/FAIBLES ====================
function generateStrengthsWeaknesses(jeuId) {
    const strengthsContainer = document.querySelector('.strengths ul');
    const weaknessesContainer = document.querySelector('.weaknesses ul');
    
    if (!strengthsContainer || !weaknessesContainer) return;
    
    // Points forts (basés sur les données du jeu)
    const strengths = {
        4572: [
            "Système ATB révolutionnaire",
            "Histoire émouvante",
            "Bande sonore mémorable",
            "Personnages charismatiques"
        ],
        858: [
            "Bande sonore légendaire",
            "Histoire épique",
            "Innovation technique 3D",
            "Système Materia"
        ],
        3549: [
            "Gameplay 3D innovant",
            "Donjons variés",
            "Musique culte",
            "Liberté d'exploration"
        ],
        52872: [
            "Gameplay nerveux",
            "Atmosphère tendue",
            "Réalisabilité élevée",
            "Boss mémorables"
        ]
    };
    
    // Points faibles
    const weaknesses = {
        4572: [
            "Traduction approximative",
            "Difficulté inégale",
            "Certains bugs persistants"
        ],
        858: [
            "Graphismes datés",
            "Traduction approximative",
            "Rythme parfois lent"
        ],
        3549: [
            "Graphismes techniques limités",
            "Certains donjons complexes",
            "Temple de l'Eau frustrant"
        ],
        52872: [
            "Quick Time Events nombreux",
            "Moins horrifique que les opus précédents",
            "Dialogues parfois ridicules"
        ]
    };
    
    const gameStrengths = strengths[jeuId] || strengths[4572];
    const gameWeaknesses = weaknesses[jeuId] || weaknesses[4572];
    
    strengthsContainer.innerHTML = gameStrengths.map(s => `<li><i class="fas fa-check-circle"></i> ${s}</li>`).join('');
    weaknessesContainer.innerHTML = gameWeaknesses.map(w => `<li><i class="fas fa-exclamation-triangle"></i> ${w}</li>`).join('');
}

// ==================== CHANGEMENTS (tables changeVersion, changePortage, changeLocale) ====================
function generateChanges(jeuId) {
    const changesContainer = document.querySelector('.changes-grid');
    if (!changesContainer) return;
    
    let censures = [];
    let restoredChanges = [];
    let easterEgg = null;
    
    if (jeuId == 4572) {
        censures = ffivChangeLocale.filter(c => c.type === "Censure" || (c.type === "Gameplay" && c.region === "USA"));
        easterEgg = ffivChangeLocale.find(c => c.description.includes("You spoony bard!"));
    }
    
    const html = `
        <div class="change-card censorship">
            <h3><i class="fas fa-ban"></i> Censures & Modifications (Version USA)</h3>
            <ul>
                ${censures.map(c => `<li>❌ ${c.description}</li>`).join('')}
            </ul>
        </div>
        <div class="change-card restored">
            <h3><i class="fas fa-check-circle"></i> Version Originale (Japon)</h3>
            <ul>
                <li>✅ Contenu non censuré</li>
                <li>✅ Dialogues originaux</li>
                <li>✅ Toutes les animations présentes</li>
                <li>✅ Difficulté originale préservée</li>
            </ul>
        </div>
        <div class="change-card easter">
            <h3><i class="fas fa-mask"></i> "You spoony bard!"</h3>
            <p>${easterEgg ? easterEgg.description : "La célèbre erreur de traduction de la version SNES où Tellah traite Edward de 'spoony bard' au lieu de 'bastard' ou 'son of a bitch'."}</p>
            <p><small>Cette phrase culte vient du script original "kisama" (vulgaire) mal traduit.</small></p>
        </div>
    `;
    
    changesContainer.innerHTML = html;
}

// ==================== TABLEAU DES PORTAGES (tables portage + plateforme) ====================
function generatePortageTable(jeuId) {
    let portages = [];
    if (jeuId == 4572) portages = ffivPortages;
    
    const tableBody = document.querySelector('.comparative-table tbody');
    if (tableBody) {
        tableBody.innerHTML = portages.map(p => `
            <tr>
                <td><strong>${p.plateforme}</strong></td>
                <td>${p.resolution}</td>
                <td>${p.framerate} fps</td>
                <td>${p.stable ? '✅ Stable' : '⚠️ Instable'}</td>
                <td>${p.lagSup ? '⚠️ Latence' : '✅ Fluide'}</td>
                <td>${p.dateSortie}</td>
                <td><span class="rating">${p.note}/10</span></td>
            </tr>
        `).join('');
    }
}

// ==================== TIMELINE (basée sur les versions) ====================
function generateTimeline(jeuId) {
    let versions = [];
    if (jeuId == 4572) versions = ffivVersions;
    else if (jeuId == 858) versions = ffviiVersions;
    else if (jeuId == 3549) versions = zeldaVersions;
    else if (jeuId == 52872) versions = re4Versions;
    
    const timelineContainer = document.querySelector('.timeline');
    if (timelineContainer) {
        timelineContainer.innerHTML = versions.map(v => `
            <div class="timeline-item" data-year="${v.year}">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h3>${v.name}</h3>
                    <p>${v.type}</p>
                    <span>${v.year}</span>
                </div>
            </div>
        `).join('');
    }
}

// ==================== INITIALISATION PAGE DÉTAIL ====================
function initJeuDetail() {
    const jeuId = getJeuIdFromURL();
    if (jeuId) {
        generateGameDetail(parseInt(jeuId));
    }
}

// ==================== SLIDER AVANT/APRES ====================
function initSlider() {
    const slider = document.getElementById('sliderInput');
    const afterImage = document.querySelector('.slider-image-after');
    const handle = document.getElementById('sliderHandle');
    
    if (!slider || !afterImage) return;
    
    function updateSlider(value) {
        afterImage.style.width = `${value}%`;
        if (handle) {
            handle.style.left = `${value}%`;
        }
    }
    
    slider.addEventListener('input', (e) => {
        updateSlider(e.target.value);
    });
    
    updateSlider(50);
}

// ==================== COMPARATEUR LOGIC ====================
const comparateurVersionData = {
    ps1: { graphics: 60, audio: 100, performance: 80, gameplay: 95, note: 9.5 },
    ps4: { graphics: 80, audio: 95, performance: 85, gameplay: 85, note: 8.9 },
    pc: { graphics: 75, audio: 85, performance: 70, gameplay: 80, note: 8.8 },
    switch: { graphics: 70, audio: 80, performance: 75, gameplay: 80, note: 8.7 }
};

function updateComparison() {
    const v1 = document.getElementById('version1')?.value;
    const v2 = document.getElementById('version2')?.value;
    const v3 = document.getElementById('version3')?.value;
    
    if (!v1 && !v2) return;
    
    const names = {
        ps1: "PlayStation Original",
        ps4: "PlayStation 4",
        pc: "PC Remaster",
        switch: "Nintendo Switch"
    };
    
    document.getElementById('version1Name').textContent = names[v1] || "Version 1";
    document.getElementById('version2Name').textContent = names[v2] || "Version 2";
    document.getElementById('version3Name').textContent = names[v3] || "Version 3";
    
    if (v1) {
        document.getElementById('graph1').textContent = `${comparateurVersionData[v1]?.graphics || 0}/100`;
        document.getElementById('audio1').textContent = `${comparateurVersionData[v1]?.audio || 0}/100`;
        document.getElementById('perf1').textContent = `${comparateurVersionData[v1]?.performance || 0}/100`;
        document.getElementById('gameplay1').textContent = `${comparateurVersionData[v1]?.gameplay || 0}/100`;
        document.getElementById('note1').textContent = comparateurVersionData[v1]?.note || "-";
    }
    
    if (v2) {
        document.getElementById('graph2').textContent = `${comparateurVersionData[v2]?.graphics || 0}/100`;
        document.getElementById('audio2').textContent = `${comparateurVersionData[v2]?.audio || 0}/100`;
        document.getElementById('perf2').textContent = `${comparateurVersionData[v2]?.performance || 0}/100`;
        document.getElementById('gameplay2').textContent = `${comparateurVersionData[v2]?.gameplay || 0}/100`;
        document.getElementById('note2').textContent = comparateurVersionData[v2]?.note || "-";
    }
    
    if (v3) {
        document.getElementById('graph3').textContent = `${comparateurVersionData[v3]?.graphics || 0}/100`;
        document.getElementById('audio3').textContent = `${comparateurVersionData[v3]?.audio || 0}/100`;
        document.getElementById('perf3').textContent = `${comparateurVersionData[v3]?.performance || 0}/100`;
        document.getElementById('gameplay3').textContent = `${comparateurVersionData[v3]?.gameplay || 0}/100`;
        document.getElementById('note3').textContent = comparateurVersionData[v3]?.note || "-";
    }
    
    let bestVersion = v1;
    let bestNote = comparateurVersionData[v1]?.note || 0;
    if (v2 && (comparateurVersionData[v2]?.note || 0) > bestNote) {
        bestVersion = v2;
        bestNote = comparateurVersionData[v2]?.note;
    }
    if (v3 && (comparateurVersionData[v3]?.note || 0) > bestNote) {
        bestVersion = v3;
        bestNote = comparateurVersionData[v3]?.note;
    }
    
    const verdictDiv = document.getElementById('verdict');
    if (verdictDiv && bestVersion) {
        verdictDiv.innerHTML = `
            <h3><i class="fas fa-trophy"></i> Verdict</h3>
            <p>La version <strong>${names[bestVersion]}</strong> est la meilleure avec une note de ${bestNote}/10 !</p>
        `;
    }
    
    updateRadarChart(v1, v2, v3);
}

let radarChart = null;

function updateRadarChart(v1, v2, v3) {
    const ctx = document.getElementById('radarChart')?.getContext('2d');
    if (!ctx) return;
    
    const datasets = [];
    const colors = ['#00d2ff', '#ff6b6b', '#ffd93d'];
    const names = {
        ps1: "PS1 Original",
        ps4: "PS4 Remaster", 
        pc: "PC Remaster",
        switch: "Switch Port"
    };
    
    let idx = 0;
    [v1, v2, v3].forEach(v => {
        if (v && comparateurVersionData[v]) {
            datasets.push({
                label: names[v],
                data: [
                    comparateurVersionData[v].graphics,
                    comparateurVersionData[v].audio,
                    comparateurVersionData[v].performance,
                    comparateurVersionData[v].gameplay
                ],
                backgroundColor: colors[idx] + '40',
                borderColor: colors[idx],
                borderWidth: 2,
                pointBackgroundColor: colors[idx]
            });
            idx++;
        }
    });
    
    if (radarChart) {
        radarChart.destroy();
    }
    
    radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Graphismes', 'Audio', 'Performance', 'Gameplay'],
            datasets: datasets
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                r: {
                    beginAtZero: true,
                    max: 100,
                    ticks: { color: '#f0f0f0' },
                    grid: { color: 'rgba(255,255,255,0.1)' }
                }
            },
            plugins: {
                legend: { labels: { color: '#f0f0f0' } }
            }
        }
    });
}

// ==================== FAQ ACCORDION ====================
function initFaq() {
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            question.classList.toggle('active');
            const answer = question.nextElementSibling;
            answer.classList.toggle('show');
        });
    });
}

// ==================== DIFFICULTY STARS ====================
function initDifficultyStars() {
    const stars = document.querySelectorAll('.difficulty-star');
    const hiddenInput = document.getElementById('difficulty');
    
    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = parseInt(star.getAttribute('data-value'));
            if (hiddenInput) hiddenInput.value = value;
            
            stars.forEach((s, i) => {
                if (i < value) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
        });
    });
}

// ==================== ADD POINTS (STRENGTHS/WEAKNESSES) ====================
function initAddPoints() {
    const addStrength = document.getElementById('addStrength');
    const addWeakness = document.getElementById('addWeakness');
    const strengthsList = document.getElementById('strengthsList');
    const weaknessesList = document.getElementById('weaknessesList');
    
    if (addStrength && strengthsList) {
        addStrength.addEventListener('click', () => {
            const newItem = document.createElement('div');
            newItem.className = 'point-item';
            newItem.innerHTML = `
                <input type="text" placeholder="Point fort...">
                <button type="button" class="remove-point"><i class="fas fa-times"></i></button>
            `;
            strengthsList.appendChild(newItem);
            newItem.querySelector('.remove-point').addEventListener('click', () => newItem.remove());
        });
    }
    
    if (addWeakness && weaknessesList) {
        addWeakness.addEventListener('click', () => {
            const newItem = document.createElement('div');
            newItem.className = 'point-item';
            newItem.innerHTML = `
                <input type="text" placeholder="Point faible...">
                <button type="button" class="remove-point"><i class="fas fa-times"></i></button>
            `;
            weaknessesList.appendChild(newItem);
            newItem.querySelector('.remove-point').addEventListener('click', () => newItem.remove());
        });
    }
    
    document.querySelectorAll('.remove-point').forEach(btn => {
        btn.addEventListener('click', () => btn.parentElement.remove());
    });
}

// ==================== SCORE SLIDERS ====================
function initScoreSliders() {
    const sliders = document.querySelectorAll('.score-slider');
    
    sliders.forEach(slider => {
        const valueSpan = slider.nextElementSibling;
        slider.addEventListener('input', () => {
            valueSpan.textContent = slider.value;
        });
    });
}

// ==================== FORM SUBMISSIONS ====================
function initForms() {
    const addJeuForm = document.getElementById('addJeuForm');
    const addVersionForm = document.getElementById('addVersionForm');
    const contactForm = document.getElementById('contactForm');
    
    if (addJeuForm) {
        addJeuForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('✅ Jeu ajouté avec succès !');
            addJeuForm.reset();
        });
    }
    
    if (addVersionForm) {
        addVersionForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('✅ Version ajoutée avec succès !');
            addVersionForm.reset();
        });
    }
    
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('📧 Message envoyé ! Nous vous répondrons dans les plus brefs délais.');
            contactForm.reset();
        });
    }
}

// ==================== EXPORT PDF ====================
function initExport() {
    const exportBtn = document.getElementById('exportBtn');
    
    if (exportBtn) {
        exportBtn.addEventListener('click', () => {
            alert('📄 Export PDF - Fonctionnalité à venir avec jsPDF');
        });
    }
    
    const copyBtn = document.getElementById('copyBtn');
    if (copyBtn) {
        copyBtn.addEventListener('click', () => {
            navigator.clipboard.writeText(window.location.href);
            alert('🔗 Lien copié dans le presse-papier !');
        });
    }
}

// ==================== SEARCH FUNCTIONALITY ====================
const searchInput = document.getElementById('searchInput');
if (searchInput) {
    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const gameCards = document.querySelectorAll('.game-card');
        
        gameCards.forEach(card => {
            const title = card.querySelector('h3')?.textContent.toLowerCase() || '';
            const desc = card.querySelector('p')?.textContent.toLowerCase() || '';
            
            if (title.includes(searchTerm) || desc.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
}

// ==================== BOUTON AJOUTER VERSION ====================
function initAddVersionButton() {
    const addVersionBtn = document.querySelector('.btn-add-version');
    if (addVersionBtn) {
        const jeuId = getJeuIdFromURL();
        addVersionBtn.onclick = () => {
            window.location.href = `ajouter-version.html?jeuId=${jeuId}`;
        };
    }
}

// ==================== INITIALISATION 3D ====================
function init3D() {
    const canvas = document.getElementById('heroCanvas');
    if (!canvas) return;
    
    canvas.innerHTML = '';
    
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true });
    
    const size = Math.min(window.innerWidth * 0.4, 400);
    renderer.setSize(size, size);
    canvas.appendChild(renderer.domElement);
    
    const group = new THREE.Group();
    
    // Corps de la console
    const bodyGeo = new THREE.BoxGeometry(2.5, 0.4, 1.8);
    const material = new THREE.MeshStandardMaterial({ color: 0x00d2ff, emissive: 0x004466, metalness: 0.7, roughness: 0.3 });
    const body = new THREE.Mesh(bodyGeo, material);
    group.add(body);
    
    // Cercles style manette
    const circleGeo = new THREE.SphereGeometry(0.25, 32, 32);
    const darkMat = new THREE.MeshStandardMaterial({ color: 0x333333 });
    
    const leftCircle = new THREE.Mesh(circleGeo, darkMat);
    leftCircle.position.set(-0.8, 0.25, 0.6);
    group.add(leftCircle);
    
    const rightCircle = new THREE.Mesh(circleGeo, darkMat);
    rightCircle.position.set(0.8, 0.25, 0.6);
    group.add(rightCircle);
    
    // Croix directionnelle
    const crossMat = new THREE.MeshStandardMaterial({ color: 0x888888 });
    const crossHoriz = new THREE.Mesh(new THREE.BoxGeometry(0.6, 0.1, 0.2), crossMat);
    crossHoriz.position.set(-0.8, 0.25, -0.4);
    group.add(crossHoriz);
    
    const crossVert = new THREE.Mesh(new THREE.BoxGeometry(0.2, 0.6, 0.2), crossMat);
    crossVert.position.set(-0.8, 0.25, -0.4);
    group.add(crossVert);
    
    // Boutons
    const buttonMat = new THREE.MeshStandardMaterial({ color: 0xff3366 });
    const positions = [[0.6, -0.5], [0.9, -0.4], [0.6, -0.2], [0.9, -0.2]];
    positions.forEach(pos => {
        const btn = new THREE.Mesh(new THREE.SphereGeometry(0.12, 16, 16), buttonMat);
        btn.position.set(pos[0], 0.25, pos[1]);
        group.add(btn);
    });
    
    scene.add(group);
    
    // Lumières
    const light1 = new THREE.DirectionalLight(0xffffff, 1);
    light1.position.set(2, 3, 4);
    scene.add(light1);
    
    const light2 = new THREE.PointLight(0x00d2ff, 0.5);
    light2.position.set(1, 2, 2);
    scene.add(light2);
    
    scene.add(new THREE.AmbientLight(0x404060));
    
    camera.position.z = 4;
    camera.position.y = 0.5;
    
    // Particules
    const particleCount = 500;
    const particlesGeo = new THREE.BufferGeometry();
    const particlesPos = [];
    for (let i = 0; i < particleCount; i++) {
        particlesPos.push((Math.random() - 0.5) * 20);
        particlesPos.push((Math.random() - 0.5) * 10);
        particlesPos.push((Math.random() - 0.5) * 15 - 5);
    }
    particlesGeo.setAttribute('position', new THREE.BufferAttribute(new Float32Array(particlesPos), 3));
    const particlesMat = new THREE.PointsMaterial({ color: 0x00d2ff, size: 0.05, transparent: true, opacity: 0.5 });
    const particles = new THREE.Points(particlesGeo, particlesMat);
    scene.add(particles);
    
    let time = 0;
    function animate() {
        requestAnimationFrame(animate);
        time += 0.01;
        group.rotation.y += 0.008;
        group.rotation.x = Math.sin(time) * 0.1;
        group.rotation.z = Math.cos(time * 0.7) * 0.05;
        particles.rotation.y += 0.002;
        particles.rotation.x += 0.001;
        renderer.render(scene, camera);
    }
    animate();
    
    window.addEventListener('resize', () => {
        const newSize = Math.min(window.innerWidth * 0.4, 400);
        renderer.setSize(newSize, newSize);
    });
}

// ==================== INITIALISATION ====================
document.addEventListener('DOMContentLoaded', () => {
    generateGamesGrid();
    animateCounters();
    initSlider();
    initFaq();
    initDifficultyStars();
    initAddPoints();
    initScoreSliders();
    initForms();
    initExport();
    initAddVersionButton();
    
    // Vérifier si on est sur la page d'accueil pour lancer la 3D
    if (document.getElementById('heroCanvas')) {
        init3D();
    }
    
    // Vérifier si on est sur la page détail
    if (window.location.pathname.includes('jeu-detail.html')) {
        initJeuDetail();
    }
    
    const compareBtn = document.getElementById('compareBtn');
    if (compareBtn) {
        compareBtn.addEventListener('click', updateComparison);
    }
});