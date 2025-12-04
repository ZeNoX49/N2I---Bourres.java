class Lasergame {
    constructor() {
        this.score = 0;
        this.hp = 100;
        this.timeLeft = 120;
        this.gameActive = false;
        this.enemies = document.querySelectorAll('.enemy, [data-enemy]');
        console.log('🔫 Lasergame chargé !', this.enemies.length, 'ennemis');
        this.init();
    }

    init() {
        const startBtn = document.getElementById('start-game');
        const saveBtn = document.getElementById('save-score');
        const restartBtn = document.getElementById('restart-game');

        if (startBtn) startBtn.onclick = () => this.startGame();
        if (saveBtn) saveBtn.onclick = () => this.saveScore();
        if (restartBtn) restartBtn.onclick = () => this.restartGame();

        this.showLeaderboard();
    }


    startGame() {
        console.log('🚀 Démarrage !');
        this.gameActive = true;
        document.body.classList.add('game-active');
        document.getElementById('game-ui').style.display = 'block';
        document.getElementById('start-game').style.display = 'none';
        document.getElementById('game-info').style.display = 'block';
        document.getElementById('weapon-cursor').style.display = 'block';

        document.addEventListener('mousemove', (e) => this.updateCursor(e));
        document.addEventListener('click', (e) => this.shoot(e));

        this.timer = setInterval(() => this.updateTimer(), 1000);
        this.riposteInterval = setInterval(() => this.enemyRiposte(), 2000);
    }

    updateCursor(e) {
        const cursor = document.getElementById('weapon-cursor');
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
    }

    shoot(e) {
        if (!this.gameActive) return;

        const cursor = document.getElementById('weapon-cursor');
        cursor.style.transform = 'translate(-50%,-50%) scale(1.3) rotate(10deg)';
        setTimeout(() => {
            cursor.style.transform = 'translate(-50%,-50%)';
        }, 150);

        const target = document.elementFromPoint(e.clientX, e.clientY);
        let enemyEl = target?.closest('.enemy, [data-enemy]');
        const enemyValue = enemyEl?.dataset?.enemy;

        if (enemyValue) {
            const points = parseInt(enemyValue);
            this.score += points;
            this.updateUI();

            enemyEl.classList.add('hit');
            setTimeout(() => enemyEl.classList.add('dead'), 500);
            console.log(`💥 HIT ! +${points}pts | Total: ${this.score}`);
        }
    }

    enemyRiposte() {
        if (!this.gameActive || Math.random() > 0.4) return;
        const aliveEnemies = Array.from(this.enemies).filter(el => !el.classList.contains('dead'));
        if (aliveEnemies.length > 0) {
            this.takeDamage(15);
            console.log('🔥 RIPOSTE !');
        }
    }

    takeDamage(amount) {
        this.hp -= amount;
        document.body.classList.add('damage-flash');
        setTimeout(() => document.body.classList.remove('damage-flash'), 300);
        this.updateUI();
        if (this.hp <= 0) this.endGame();
    }

    updateTimer() {
        this.timeLeft--;
        this.updateUI();
        if (this.timeLeft <= 0) this.endGame();
    }

    updateUI() {
        document.getElementById('score').textContent = this.score;
        document.getElementById('hp').textContent = Math.max(0, this.hp);
        document.getElementById('timer').textContent = this.timeLeft;
    }

    endGame() {
        this.gameActive = false;
        clearInterval(this.timer);
        clearInterval(this.riposteInterval);
        document.getElementById('final-score').textContent = this.score;
        document.getElementById('game-over').style.display = 'block';
        console.log('🏁 GAME OVER ! Score:', this.score);
    }

    saveScore() {
        const name = document.getElementById('player-name').value || 'Anonyme';
        const scores = JSON.parse(localStorage.getItem('lasergame-scores') || '[]');
        scores.push({ name, score: this.score, date: new Date().toLocaleString() });
        scores.sort((a,b) => b.score - a.score).slice(0,10);
        localStorage.setItem('lasergame-scores', JSON.stringify(scores));
        this.showLeaderboard();
        document.getElementById('game-over').style.display = 'none';
    }

    showLeaderboard() {
        const scores = JSON.parse(localStorage.getItem('lasergame-scores') || '[]');
        document.getElementById('leaderboard').innerHTML =
            scores.map(s => `<div style="margin:2px 0;">${s.name}: ${s.score}pts</div>`).join('') ||
            'Aucun score enregistré';
    }

    restartGame() {
        location.reload();
    }
}

new Lasergame();