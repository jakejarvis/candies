<?php
if(isset($_GET['pass'])) {
    
    $filename = "../saves/".$_GET['pass'].".txt";
    
    if(strlen($_GET['pass']) != 5 || !file_exists($filename)) {
        echo 'alert("Invalid save code. Please try again.");';
        echo 'window.location = "index.php";';
        echo 'var load = { loadSave : function() { } }';
        die();
    }
    
    // Open the file
    $fp = @fopen($filename, 'r'); 

    // Add each line to an array
    if ($fp) {
       $array = explode("\n", fread($fp, filesize($filename)));
    }
    
    // Close the file
    fclose($fp);
?>
var load = {
    
    loadSave : function(){
		code = "<?php echo $_GET['pass'] ?>";
        // buttons.js
        // The only variable says if the home buttons are disabled or not
        // We don't have to save that since the button to make a save is itself a home button
        
        // sword.js \*/ must be loaded before forge.js, since the forge speech may be based on the sword name.., must be loaded before candies.js too \*/
        <?php if($array[0] != "none") { ?>sword.setName("<?php echo $array[0] ?>");<?php } ?> // sword.name string 50
        sword.setSpecialSword(<?php echo $array[1] ?>); // sword.specialSword bool
        sword.setSpecialPower(<?php echo $array[2] ?>); // sword.specialPower int
        // summonList : mobs to summon are added in the onload function, so we don't have to save it
        
        // candies.js
        candies.setNbrOwned(<?php echo $array[3] ?>); // candies.nbrOwned int
        <?php if($array[4] != 0) { ?>candies.setNbrThrown(<?php echo $array[4] ?>);<?php } ?> // candies.nbrThrown int
        <?php if($array[5] != 0) { ?>candies.setNbrEaten(<?php echo $array[5] ?>);<?php } ?> // candies.nbrEaten int
        candies.setNbrTotal(<?php echo $array[6] ?>); // candies.nbrTotal int
        candies.setCandiesPerSecond(<?php echo $array[7] ?>); // candies.candiesPerSecond int
        
        // candiesConverter.js
        candiesConverter.setActivated(<?php echo $array[8] ?>); // candiesConverter.activated bool
        
        // castleEntrance.js
        // The variables are only used while questing, so we don't have to save them
        
        // cauldron.js
        cauldron.setBookPage(<?php echo $array[9] ?>); // cauldron.bookPage int
        cauldron.setCandiesInTheCauldron(<?php echo $array[10] ?>); // cauldron.candiesInTheCauldron int
        cauldron.setLollipopsInTheCauldron(<?php echo $array[11] ?>); // cauldron.lollipopsInTheCauldron int
        
        // chocolateBars.js
        <?php if($array[12] != 0) { ?>chocolateBars.nbrOwned(<?php echo $array[12] ?>);<?php } ?> // chocolateBars.nbrOwned int
        
        // damage.js
        // No variables, nothing to save
        
        // drops.js
        // No variables, nothing to save
        
        // farm.js
        farm.setLollipopsPlanted(<?php echo $array[13] ?>); // farm.lollipopsPlanted int
        // farm.productionDelayType : no save, it's calculated
        // farm.lollipopsPerDay : no save, it's calculated
        // farm.lollipopsProduction : no save, it's calculated
        // farm.maxLollipopsPerDay : constant, no save
        // farm.flagsList : constant, no save
        farm.setCurrentFlagIndex(<?php echo $array[14] ?>); // farm.currentFlagIndex int
        farm.setPlantingButtonsStep(<?php echo $array[15] ?>); // farm.plantingButtonsStep int
        
        // forge.js
        // forge.shown : can't be true when we save, so we don't save it
        forge.setStep(<?php echo $array[16] ?>); // forge.step
        // forge.speech : we don't save, since it's set by the stepStep function
        
        // htmlInteraction.js
        // No variables, nothing to save
        
        // shop.js
        shop.setBuy10LollipopsButtonShown(<?php echo $array[17] ?>); // shop.buy10LollipopsButtonShown bool
        shop.setShown(<?php echo $array[18] ?>); // shop.shown bool
        shop.setTicklingStep(<?php echo $array[19] ?>); // shop.ticklingStep int
        shop.setClickingOnLollipopStep(<?php echo $array[20] ?>); // shop.clickingOnLollipopStep int
        // shop.oneLollipopPrice : calculated by the clickingOnLollipopStep, so we don't save
        // shop.tenLollipopsPrice : same as above
        // shop.currentSwordButtonId : calculated by showProduct, so we don't save
        // shop.currentSwordPrice : same as above
        
        // hut.js
        // hut.shown : can't be true when we save, so we don't save it
        hut.setStep(<?php echo $array[21] ?>); // hut.step int
        hut.setSpeech("<?php echo $array[22] ?>"); // hut.speech string 1000
        
        // inventory.js
        inventory.setMagicianHatLetter("<?php echo $array[23] ?>"); // inventory.magicianHatLetter string 50
        
        // jquery.tabify.js
        // nothing to save
        
        // land
        // land.list : this list is constant, so no need to save
        
        // lollipops.js
        <?php if($array[24] != 0) { ?>lollipops.setNbrOwned(<?php echo $array[24] ?>);<?php } ?> // lollipops.nbrOwned int
        lollipops.setNbrInStock(<?php echo $array[25] ?>); // lollipops.nbrInStock int
        lollipops.setNbrBought(<?php echo $array[26] ?>); // lollipops.nbrBought int
        // lollipops.stockShortage : calculated by setNbrInStock, so no need to save
        
        // main.js
        main.setNbrOfSecondsSinceLastMinInterval(<?php echo $array[27] ?>); // main.nbrOfSecondsSinceLastMinInterval int
        main.setNbrOfSecondsSinceLastHourInterval(<?php echo $array[28] ?>); // main.nbrOfSecondsSinceLastHourInterval int
        main.setNbrOfSecondsSinceLastDayInterval(<?php echo $array[29] ?>); // main.nbrOfSecondsSinceLastDayInterval int
        
        // mountGoblin.js
        mountGoblin.setBasicChestProbability(<?php echo $array[30] ?>); // mountGoblin.basicChestProbability int
        
        // peacefulForest.js
        peacefulForest.setBasicChestProbability(<?php echo $array[31] ?>); // peacefulForest.basicChestProbability int
        peacefulForest.setPoniesEncountered(<?php echo $array[32] ?>); // peacefulForest.poniesEncountered int
        
        // objects.js
        objects.setHaveObject("key", <?php echo $array[33] ?>); // objects.list.key.have bool
        objects.setHaveObject("hutMap", <?php echo $array[34] ?>); // idem
        objects.setHaveObject("wellMap", <?php echo $array[35] ?>); // idem
        objects.setHaveObject("swampMap", <?php echo $array[36] ?>); // idem
        objects.setHaveObject("boots", <?php echo $array[37] ?>); // idem
        objects.setHaveObject("magicianHat", <?php echo $array[38] ?>); // idem
        objects.setHaveObject("pinkRing", <?php echo $array[39] ?>); // idem
        objects.setHaveObject("forgeMap", <?php echo $array[40] ?>); // idem
        objects.setHaveObject("candiesConverter", <?php echo $array[41] ?>); // idem
        objects.setHaveObject("plateArmour", <?php echo $array[42] ?>); // idem
        objects.setHaveObject("cauldron", <?php echo $array[43] ?>); // idem
        objects.setHaveObject("magicalHorn", <?php echo $array[44] ?>); // idem
        objects.setHaveObject("hornOfPlenty", <?php echo $array[45] ?>); // idem
        objects.setHaveObject("oldAmulet", <?php echo $array[46] ?>); // idem
        
        // potions.js
        // potions.list : potions are added to the list in the onload function, no need to save most variables
        // the only variables we need to save is the shown one and the nbrOwned one
        potions.setPotionShown(potions.list.health, <?php echo $array[47] ?>); // potions.list.health.shown bool
        potions.setPotionShown(potions.list.escape, <?php echo $array[48] ?>); // idem
        potions.setPotionShown(potions.list.berserk, <?php echo $array[49] ?>); // idem
        potions.setPotionShown(potions.list.fireScroll, <?php echo $array[50] ?>); // idem
        potions.setPotionShown(potions.list.acidRainScroll, <?php echo $array[51] ?>); // idem
        potions.setPotionShown(potions.list.teleportScroll, <?php echo $array[52] ?>); // idem
        potions.setPotionShown(potions.list.earthquakeScroll, <?php echo $array[53] ?>); // idem
        potions.setPotionShown(potions.list.impInvocationScroll, <?php echo $array[54] ?>); // idem
        potions.setPotionShown(potions.list.majorHealth, <?php echo $array[55] ?>); // idem
        potions.setPotionShown(potions.list.invulnerability, <?php echo $array[56] ?>); // idem
        potions.setPotionShown(potions.list.turtle, <?php echo $array[57] ?>); // idem
        potions.setPotionShown(potions.list.jelly, <?php echo $array[58] ?>); // idem
        potions.setPotionShown(potions.list.seed, <?php echo $array[59] ?>); // idem
        potions.setPotionShown(potions.list.cloning, <?php echo $array[60] ?>); // idem
        potions.setPotionShown(potions.list.superman, <?php echo $array[61] ?>); // idem
        potions.setPotionShown(potions.list.gmooh, <?php echo $array[62] ?>); // idem
        
        potions.setPotionNbrOwned(potions.list.health, <?php echo $array[63] ?>); // potions.list.health.nbrOwned int
        potions.setPotionNbrOwned(potions.list.escape, <?php echo $array[64] ?>); // idem
        potions.setPotionNbrOwned(potions.list.berserk, <?php echo $array[65] ?>); // idem
        potions.setPotionNbrOwned(potions.list.fireScroll, <?php echo $array[66] ?>); // idem
        potions.setPotionNbrOwned(potions.list.acidRainScroll, <?php echo $array[67] ?>); // idem
        potions.setPotionNbrOwned(potions.list.teleportScroll, <?php echo $array[68] ?>); // idem
        potions.setPotionNbrOwned(potions.list.earthquakeScroll, <?php echo $array[69] ?>); // idem
        potions.setPotionNbrOwned(potions.list.impInvocationScroll, <?php echo $array[70] ?>); // idem
        potions.setPotionNbrOwned(potions.list.majorHealth, <?php echo $array[71] ?>); // idem
        potions.setPotionNbrOwned(potions.list.invulnerability, <?php echo $array[72] ?>); // idem
        potions.setPotionNbrOwned(potions.list.turtle, <?php echo $array[73] ?>); // idem
        potions.setPotionNbrOwned(potions.list.jelly, <?php echo $array[74] ?>); // idem
        potions.setPotionNbrOwned(potions.list.seed, <?php echo $array[75] ?>); // idem
        potions.setPotionNbrOwned(potions.list.cloning, <?php echo $array[76] ?>); // idem
        potions.setPotionNbrOwned(potions.list.superman, <?php echo $array[77] ?>); // idem
        potions.setPotionNbrOwned(potions.list.gmooh, <?php echo $array[78] ?>); // idem
        
        potions.updateOnPage();
        
        // quest.js
        quest.setMaxLandOrder(<?php echo $array[79] ?>); // quest.maxLandOrder, must be saved because it indicates the lands we have unlocked for the moment int
        quest.setTiredTime(<?php echo $array[80] ?>); // quest.tiredTime, must be saved because we may do a quest, have a long tired time, and save before the tired time ends int
        // All other variables should not be saved because they only describe the internal states of the quest, we we can't save while questing !
        
        // random.js
        // nothing to save
        
        // speech.js
        // nothing to save
        
        // spells.js
        // spells.list : spells are added to the list in the onload function, no need to save
        spells.setFasterCandiesFibo(<?php echo $array[81] ?>, <?php echo $array[82] ?>); // spells.fasterCandiesFiboPrev && spells.fasterCandiesFiboCurr int && int
        
        // status.js
        // nothing to save
        
        // swamp.js
        // swamp.shown : can't be true when we save, so we don't save it
        swamp.setStep(<?php echo $array[83] ?>); // swamp.step int
        
        // underwaterCave.js
        // nothing to save
        
        // wishingWell.js
        // wishingWell.shown : can't be true when we save, so we don't save it
        wishingWell.setSpeech("<?php echo $array[84] ?>"); // wishingWell.speech string 1000
        wishingWell.setStep(<?php echo $array[85] ?>); // wishingWell.step int
        
        // yourself.js
        yourself.setCanSurpass(<?php echo $array[86] ?>); // yourself.canSurpass bool
        
        // castleEntrance.js
        // nothing to save, all the variables are internal states of the quest
    
        developperComputer.setWon(<?php echo $array[87] ?>);
}
    
};
<?php } ?>