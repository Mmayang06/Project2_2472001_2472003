const fs = require('fs');
const path = require('path');

function walk(dir) {
    let results = [];
    const list = fs.readdirSync(dir);
    list.forEach(function(file) {
        file = path.join(dir, file);
        const stat = fs.statSync(file);
        if (stat && stat.isDirectory()) { 
            results = results.concat(walk(file));
        } else { 
            if (file.endsWith('.blade.php') && 
                !file.includes('login.blade.php') && 
                !file.includes('register.blade.php') && 
                !file.includes('landing.blade.php')) {
                results.push(file);
            }
        }
    });
    return results;
}

const viewsDir = path.join(__dirname, 'resources/views');
const files = walk(viewsDir);

const newSvg = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>`;

files.forEach(file => {
    let content = fs.readFileSync(file, 'utf8');

    // This regex accounts for flex-shrink-0 and other extra classes, as well as comments
    const blockRegex = /<div class="p-6 border-b border-\[#6196aa\]\/20 flex items-center justify-between.*?">[\s\S]*?<h1.*?Lab<span.*?ventory<\/span><\/h1>\s*<span.*?>(.*?)<\/span>[\s\S]*?<\/a>\s*<\/div>[\s\S]*?<div class="p-6 border-b border-\[#6196aa\]\/20 flex items-center gap-4.*?">[\s\S]*?<h4.*?>(.*?)<\/h4>[\s\S]*?<\/div>/i;
    
    const match = content.match(blockRegex);
    
    if (match) {
        const portalName = match[1];
        let fallbackName = match[2];
        const hrefMatch = content.substring(match.index).match(/<a href="(.*?)"/);
        const href = hrefMatch ? hrefMatch[1] : "#";

        const replacement = `<div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between">
        <a href="${href}" class="flex items-center gap-3 group">
            <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md group-hover:scale-105 transition-transform duration-200">
                ${newSvg}
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                <span class="text-xs text-[#c9ccc3] tracking-wide block">${portalName}</span>
                <span class="text-[10px] text-emerald-400 font-semibold tracking-wide block mt-1">${fallbackName}</span>
            </div>
        </a>
    </div>`;
        
        content = content.replace(blockRegex, replacement);
        fs.writeFileSync(file, content, 'utf8');
        console.log("Updated:", file);
    }
});
